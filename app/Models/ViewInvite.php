<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewInvite extends Model
{
    use HasFactory;

    protected $table = "Person.v_person_invite_disciple_grid";

    protected $fillable = [
        "invitedate",
        "FullName",
        "isRegistered",
        "disciplerid"
    ];
}
