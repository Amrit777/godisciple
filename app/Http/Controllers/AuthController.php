<?php

namespace App\Http\Controllers;

use App\Http\Helper\Helper;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Constant\Constants;
use App\Idea;
use App\Invite;
use App\Models\User;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\UserMail;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    //  Invite user

    // register

    // create password

    // login

    // get fetch user details

    // update user

    // destroy user

    /**
     * Create user
     *
     * @param
     *            [string] name
     * @param
     *            [string] email
     * @param
     *            [string] password
     * @param
     *            [string] password_confirmation
     * @param
     *            [numeric] role_id
     * @param
     *            [string] verify_url - frontend url to redirect on verification email
     *
     * @return  [string] message
     * @return  [object] User
     */
    public function signup(Request $request)
    {
        $mediahouse = null;
        $mediahouseSlug = null;
        $btn = ' REVIEW REGISTRATION ';
        try {
            DB::beginTransaction();
            $roleType = Helper::roleType();
            $rules = [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed',
                'role_id' => 'required|numeric|' . Rule::in($roleType) . '',
                'verify_url' => 'required|string'
            ];
            $messages = [
                'email.unique' => 'Email Id already exists!'
            ];

            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return $this->failed($validator->errors()
                    ->first());
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->state_id = Constants::STATE_DEACTIVATE;
            $user->slug = $this->createSlug(User::class, $request->name);

            // if admin or media house - added journalist - send emails respectively
            $loggedInUser = Auth::guard('api')->user();
            if ($loggedInUser) {
                // if media house added - send mail to admin
                if ($loggedInUser->isMediaHouse() && ($request->role_id ==  Constants::TYPE_JOURNALIST)) {
                    $mediahouse = $loggedInUser->name;
                    $user->media_house_id = $loggedInUser->id;
                }
            }
            // if journalist signup by frontend - can select media house
            if ($request->filled('media_house_id')) {
                $mediHouseReq = User::findOrFail($request->media_house_id);
                $user->media_house_id = $request->media_house_id;
                $mediahouse = $mediHouseReq->name;
                $mediahouseSlug = $mediHouseReq->slug;
            }

            if ($user->save()) {
                $tokenResult = $user->createToken('Personal Access Token');
                $user->update([
                    'email_verification_token' => $tokenResult->accessToken
                ]);

                $user->notify(new CustomVerifyEmail($tokenResult->accessToken, $request->verify_url));

                $admin = User::where('role_id', Constants::TYPE_ADMIN)->first();
                if (!empty($admin)) {
                    $name = ' <a href="' . Constants::FRONTEND_URL . "profile/" .  $user->slug . '">' . $user->name . '</a> ';
                    $sendMail = false;
                    $url = Constants::FRONTEND_URL;
                    switch ($user->role_id) {
                        case Constants::TYPE_JOURNALIST:
                            $subject = " Journalist Registration ";
                            if (!empty($mediahouse) && !empty($mediahouseSlug)) {
                                $name .= ' / <a href="' . Constants::FRONTEND_URL . "profile/" .  $mediahouseSlug . '">' . $mediahouse . '</a> ';
                            }
                            $first = " " . $name . ' has registered with Story Mosaic. ';
                            $url .= 'admin/partners/journalist/pending-list';
                            $sendMail = true;
                            break;
                        case Constants::TYPE_MEDIA_HOUSE:
                            $subject = " NEWS ORGANIZATION Enrollment ";
                            $url .= 'admin/partners/mediahouse/list';
                            $first = " " . $name . ' has registered with Story Mosaic. ';
                            $sendMail = true;
                            break;
                        case Constants::TYPE_COMMUNITY_USER:
                            $subject = " New Contributor Registration ";
                            $url .= 'admin/user/list';
                            $first = " " . $name . ' has registered with Story Mosaic. ';
                            $sendMail = true;
                            break;
                        default:
                            break;
                    }
                    if ($sendMail) {
                        $admin->notify(new UserMail($subject, $subject, $first, '', $url, $btn));
                    }
                }

                $data = [
                    'message' => "New sign up in the system sending to admin|subadmin approval",
                    'state_id' => 0,
                    'type_id' => Constants::NOTIFICATION_USER_SIGNUP,
                    'notifiable_id' => $user->id,
                    'notifiable_type' => get_class($user),
                    'created_by_id' => $user->id,
                    'roles' => [
                        Constants::TYPE_ADMIN,
                        Constants::TYPE_SUB_ADMIN
                    ]
                ];
                Helper::sendNotification($data);
                $msg = 'Registered Successfully! A verification mail has been sent, please check your email.';
                DB::commit();
                return $this->success(["message" => $msg, 'data' => $user->sendJson()]);
            } else {
                DB::rollback();
                return $this->failed('User creation failed!');
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            DB::rollback();
            return $this->error($exception->errorInfo);
        }
    }

    /**
     * Login user and create token
     *
     * @param
     *            [string] email
     * @param
     *            [string] password
     * @param
     *            [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean'
            ]);
            $credentials = request([
                'email',
                'password'
            ]);
            if (!Auth::attempt($credentials))
                return response()->json([
                    'status' => false,
                    'code' => 401,
                    'message' => 'Account not registered, please Sign Up'
                ], 401);

            $user = Auth::user();
            if ($user->state_id == Constants::STATE_ACTIVE && !empty($user->email_verified_at)) {
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeek(1);
                }
                $token->save();
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                    'data' => new UserResource($user),
                    'status' => true,
                    'code' => 200,
                    'token_type' => 'Bearer'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'code' => 403,
                    'message' => 'Your email address has not been verified yet. Please check your email for the link to verify your account'
                ], 403);
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * Get the authenticated User
     *
     * @return user object
     */

    public function verifyUser(Request $request)
    {
        $frontend =  Constants::FRONTEND_URL;
        $btn = "";
        $url = "";
        $user = User::where('email_verification_token', $request->token)->first();
        $invite = false;
        if (!empty($user)) {
            $user->email_verification_token = '';
            $user->email_verified_at = Carbon::now()->toDateTimeString();

            if ($user->role_id != Constants::TYPE_JOURNALIST) {
                $user->state_id = Constants::STATE_ACTIVE;
                $ideaExists = Idea::where('created_by', $user->id)->first();
                if (!empty($ideaExists)) {
                    $ideaExists->update([
                        'status' => Constants::IDEA_PENDING
                    ]);
                }
                $inviteExists = Invite::where('email', $user->email)
                    ->where('type_id', Constants::INVITE_TYPE_MAIL)->update(['user_id' => $user->id]);
                if ($inviteExists) {
                    $invite = true;
                }
            }

            // journalist
            if ($user->role_id == Constants::TYPE_JOURNALIST) {
                $first = ' <p> Thank you for signing up for Story Mosaic. </p>
                 <p> Learn more about participating in this collaborative reporting project. </p> ';
                $btn = ' LEARN MORE ';
                $url = $frontend . 'how-it-works';
            }
            // Comm user

            if ($user->role_id == Constants::TYPE_COMMUNITY_USER) {
                $first =  ' <p> Thank you for signing up for Story Mosaic.</p>
                <p> You can click the button below to return to the site
                to learn more about <a href="' . $frontend . 'how-it-works' . '">how it works</a> or to submit another story idea.</p> ';
                $btn = ' GO TO STORY MOSAIC ';
                $url = $frontend;
            }

            // media house
            if ($user->role_id == Constants::TYPE_MEDIA_HOUSE) {
                $first = ' <p> Thank you for signing up to be a partner on Story Mosaic.
                 Your request is being reviewed.
                 You will be notified as soon as it is approved.  </p> ';
            }
            $user->update();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me) {
                $token->expires_at = Carbon::now()->addWeek(1);
            }
            $token->save();
            $user->notify(new UserMail(' Email Confirmation ', ' Email Confirmation ',  $first, '', $url, $btn));

            return $this->success([
                'access_token' => $tokenResult->accessToken,
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                'data' => new UserResource($user),
                'token_type' => 'Bearer',
                'message' => 'Verified Successfully',
                'invite' => $invite
            ]);
        } else {
            return response()->json([
                'status' => true,
                'code' => 400,
                'message' => 'Invalid token provided'
            ], 400);
        }
    }
    public function resendEmailVerification(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        try {
            $tokenResult = $user->createToken('Personal Access Token');
            $user->update([
                'email_verification_token' => $tokenResult->accessToken
            ]);

            $user->notify(new CustomVerifyEmail($tokenResult->accessToken, $request->verify_url));
            $msg = 'A verification mail has been sent, please check your email.';
            return $this->success($msg);
        } catch (\Illuminate\Database\QueryException $exception) {
            return $this->error($exception->errorInfo);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return user object
     */
    public function user(Request $request)
    {
        return $this->success(['data' => $request->user()]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        try {
            $request->user()
                ->token()
                ->revoke();
            return $this->success('successfully_logged_out');
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }
}
