<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    // 'middleware' => 'cors'
], function () {
    // guest routes
    Route::post('login', 'UserController@login');
    // Route::post('auth/signup', 'AuthController@signup');
    Route::get('user-list', 'UserController@index');
    Route::get('auth-user', 'UserController@user');
    Route::get('invites-list-disciple-grid', 'InviteController@viewListindex'); // invite 1st screen // my invities
    Route::get('emailexists', 'UserController@checkEmailExists'); // invites screen ajax check
    Route::get('mobileexists', 'UserController@checkMobileExists'); // invites screen ajax check
    Route::post('user-church-role', 'UserController@userChurchRole'); // invites screen churchrole
    Route::post('inviteuser', 'UserController@inviteuser'); // invites - newdata | Reinvite
    Route::get('churchroles', 'ChurchRoleController@index'); // create password screen - get user data by salt
    Route::get('invite-user-salt/{salt}', 'UserController@userBySalt');
    Route::post('user-save-password', 'UserController@savepassword');
});




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
