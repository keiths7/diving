<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function get_user_info($uid)
    {
        $user_info = User::where('id', $uid)->find(1);
        return $user_info;
    }

    public function update_user_info($uid, $info)
    {
        // User::
    }
}
