<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "Person.Person";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "PersonID",
        "Encrypted",
        "Password",
        "Gender",
        "FirstName",
        "LastName",
        "NickName",
        "PhotoPath",
        "BaptismDate",
        "MaritalStatus",
        "BirthPlace",
        "BirthDate",
        "MobilePhone",
        "Email",
        "Address",
        "City",
        "Country",
        "ChurchRole",
        "SundayServices",
        "Ministry",
        "VirtualAccount",
        "IsDisciple",
        "isDM",
        "isDeath",
        "isWalkAway",
        "isRegistered",
        "SpouseID",
        "CoupleName",
        "DisciplerID",
        "CreateID",
        "CreateDate",
        "CreateIP",
        "UpdateID",
        "UpdateDate",
        "UpdateIP",
        "InviteDate"
    ];

    const CREATED_AT = 'CreateDate';
    const UPDATED_AT = 'UpdateDate';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
}
