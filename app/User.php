<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\UserPay;

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

    public static $rules = array(
        'name'=>'required|alpha|min:2',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    public static $reset_pwd_rules = array(
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    public function get_user_info($uid)
    {
        $user_info = User::where('id', $uid)->find(1);
        return $user_info;
    }

    public function update_user_info($uid, $info)
    {
        // User::
    }

    public function get_pay_info($uid, $toArray=false)
    {
        $query = UserPay::where('uid', '=', $uid)->first();
        $ret = array();
        if($query)
        {
            if($toArray){
                $ret = $query->toArray();
            } else {
                $ret = $query;
            }
        }
        return $ret;
    }

    public function add_pay_info($uid, $card_number, $valid_thru, $cvc)
    {
        UserPay::insert(
            ['card_number' => $card_number,
            'valid_thru' => $valid_thru,
            'cvc'=>$cvc,
            'created_at'=>date('Y-m-d H:i:s'),
            'uid'=>$uid]);
    }
}
