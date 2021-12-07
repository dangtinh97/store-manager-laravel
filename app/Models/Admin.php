<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Authenticatable
{
//    use SoftDeletes;
    protected $table = 'admins';
    protected $fillable = ['full_name','password','email',
        'gender','status','dob','mobile',
        'address','type','remember_token'
    ];
    const TYPE_SUPPER_ADMIN = "SUPPER_ADMIN";
}
