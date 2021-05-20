<?php

namespace App\Http\Controllers;

use App\Models\AdminAttribute;
use App\Models\Church;
use App\Models\Ministry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success(["data" => User::get()]);
    }

    public function inviteuser(Request $request)
    {
        $rules = [
            // "userpersonid" => "string", // one who is inviting other users.
            // "personid" => "string", // one is getting reinvited
            "formmethod" => "required|string",
            "firstname" => "required|string",
            "lastname" => "required|string",
            "nickname" => "string",
            "email" => "required|string",
            "mobilephone" => "required|string",
            "churchrole" => "required|string"
        ];
        $messages = [
            'email.unique' => 'Email Id already exists!'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->failed($validator->errors()
                ->first());
        }
        $userpersonid = NULL;
        $personid = NULL;
        if ($request->filled('userpersonid')) {
            $userpersonid = $request->userpersonid;
        }
        if ($request->filled('personid')) {
            $personid = $request->personid;
        }

        $value = [
            $request->formmethod,
            $personid,
            $request->firstname,
            $request->lastname,
            $request->nickname,
            $request->email,
            $request->mobilephone,
            $request->churchrole,
            $userpersonid,
            "",
            ""
        ];

        $result = DB::select(
            "SET NOCOUNT ON; exec Person.s_person_invite ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?;",
            $value
        );

        // $result = DB::select(
        //     "
        //     SET NOCOUNT ON; SET ANSI_NULLS ON; SET ANSI_WARNINGS ON;
        //     exec Person.s_person_invite ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?;
        //     select * from person.person where MobilePhone = '" . $request->mobilephone . "' ",
        //     $value
        // );

        if (!empty($result) && isset($result[0]->iserr)) {
            if ($result[0]->iserr == 'Y') {
                return $this->failed(["errors" => $result[0]->errmsg]);
            } elseif ($result[0]->iserr == 'N') {
                return $this->success("Invited successfully");
            }
        }
        return $this->error(["error" => $result]);
    }

    public function userChurchRole(Request $request)
    {
        // my churchroles
        $request->validate([
            'userpersonid' => 'required|string'
        ]);
        $result = DB::select("select * from person.f_person_disciplelevel(?)", [$request->userpersonid]);
        if (!empty($result)) {
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function checkEmailExists(Request $request)
    {
        // check if email exists in the invite screen
        $request->validate([
            'email' => 'required|string'
        ]);

        $result = User::where('Email', $request->email)->first();
        if (!empty($result)) {
            return $this->success();
        } else {
            return $this->error("no data found");
        }
    }
    public function checkMobileExists(Request $request)
    {
        // check if email exists in the invite screen
        $request->validate([
            'mobilephone' => 'required|string'
        ]);
        $result = User::where('MobilePhone', $request->mobilephone)->first();
        if (!empty($result)) {
            return $this->success();
        } else {
            return $this->error("no data found");
        }
    }
    public function userBySalt($salt)
    {
        // get user by invite salt token
        $result = User::where('Encrypted', $salt)->first();
        if (!empty($result)) {
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            "Gender" => 'required|string',
            "FirstName" => 'required|string',
            "LastName" => 'required|string',
            "NickName" => 'required|string',
            "BirthDate" => 'required|string', // date
            "BirthPlace" => 'required|string',
            "BaptismDate" => 'required|string', // date
            "MaritalStatus" => 'required|string',
            "SundayServices" => 'required|string',
            "Ministry" => 'required|string',
            'MobilePhone' => 'required|string',
            'Email' => 'required|string',
            "Address" => 'required|string',
            "City" => 'required|string',
            "Country" => 'required|string',
            "PersonID" => 'required|string',
            "DisciplerID" => 'required|string',
        ]);
        // get user by invite salt token
        $user = User::where('PersonID', $request->personid)->first();
        // try {
        // DB::beginTransaction();
        if (!empty($user)) {
            if ($user->update($request->all())) {
                // DB::commit();
                // if (!empty($result) && isset($result[0]->iserr)) {
                //     if ($result[0]->iserr == 'Y') {
                //         return $this->failed(["errors" => $result[0]->errmsg]);
                //     } elseif ($result[0]->iserr == 'N') {
                //         return $this->success("Invited successfully");
                //     }
                // }

                return $this->success(["data" => $user]);
            } else {
                return $this->failed();
            }
        } else {
            return $this->error("No data found");
        }
        // } catch (\Illuminate\Database\QueryException $exception) {
        //     // DB::rollback();
        //     return $this->error($exception->errorInfo);
        // }
    }
    public function maritalStatusOptions()
    {
        // get user by invite salt token
        $result = AdminAttribute::select('value')->where('Groupmasterid', 'Person')->where("subgroupid", 'Marital')->get();
        if (!empty($result)) {
            // send only value
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function cityOptions()
    {
        // select * from admin.attribute  where subgroupid = 'Kota'  and groupmasterid = ‘Person’ order by value
        $result = AdminAttribute::where('subgroupid', 'Kota')->where("groupmasterid", 'Person')->orderBy('value ASC')->get();
        if (!empty($result)) {
            // send only value
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function countryOptions()
    {
        // select * from admin.attribute  where subgroupid = 'Kota'  and groupmasterid = ‘Person’ order by value
        $result = AdminAttribute::where('subgroupid', 'country')->where("groupmasterid", 'Person')->orderBy('value ASC')->get();
        if (!empty($result)) {
            // send only value
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function churchDropdown()
    {
        // get user by invite salt token
        $result = Church::select('Church')->orderBy('Church ASC')->get();
        if (!empty($result)) {
            // send only value
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function MinistryDropdown()
    {
        // select Ministry from church.ministry order by ministryid
        $result = Ministry::select('Ministry')->orderBy('ministryid')->get();
        if (!empty($result)) {
            // send only value
            return $this->success(["data" => $result]);
        } else {
            return $this->error("No data found");
        }
    }

    public function savepassword(Request $request)
    {
        $request->validate([
            'PersonID' => 'required|string',
            // 'name' => 'required|string',
            'Email' => 'required|string',
            'MobilePhone' => 'required|string',
            // 'Password' => 'required|string'
        ]);
        // get user by invite salt token
        $user = User::where('PersonID', $request->PersonID)->first();

        // try {
        // DB::beginTransaction();
        if (!empty($user)) {
            $request['Password'] = bcrypt($request->Password);
            $update = User::where('PersonID', $request->PersonID)->update($request->all());

            if ($update) {
                // DB::commit();
                // run SP
                // $result = DB::statement(
                //     "SET NOCOUNT ON; exec Person.s_person_registered ?, ?;",
                //     [
                //         $request->PersonID,
                //         $request['Password']
                //     ]
                // );
                // if (!empty($result) && isset($result[0]->iserr)) {
                //     if ($result[0]->iserr == 'Y') {
                //         return $this->failed(["errors" => $result[0]->errmsg]);
                //     } elseif ($result[0]->iserr == 'N') {
                //         return $this->success("Invited successfully");
                //     }
                // }

                return $this->success(["data" => "dfbdf"]);
            } else {
                return $this->failed();
            }
        } else {
            return $this->error("No data found");
        }
        // } catch (\Illuminate\Database\QueryException $exception) {
        //     // DB::rollback();
        //     return $this->error($exception->errorInfo);
        // }
    }

    protected function credentials(Request $request)
    {
        if (is_numeric($request->username)) {
            return ['MobilePhone' => $request->username, 'password' => $request->password];
        } elseif (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->username, 'password' => $request->password];
        }
    }
    public function login(Request $request)
    {
        // try {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            // if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addMonths(6);
            // }
            $token->save();
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                'data' => $user,
                'status' => true,
                'code' => 200,
                'token_type' => 'Bearer'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'code' => 401,
                'message' => 'Account not registered, please Sign Up'
            ], 401);
        }


        // if ($user->state_id == Constants::STATE_ACTIVE && !empty($user->email_verified_at)) {

        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'code' => 403,
        //         'message' => 'Your email address has not been verified yet. Please check your email for the link to verify your account'
        //     ], 403);
        // }
        // } catch (\Exception $e) {
        //     return $this->error($e->getMessage());
        // }
    }

    public function user(Request $request)
    {
        return $this->success(['data' => Auth::user()]);
    }

    // (select Church from church.church order by church)
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
