<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPay extends Model
{
	protected $table = 'user_pay';

	public static $rules = array(
        'card_number'=>'required|alpha_num|min:16',
        'valid_thru'=>'required|alpha|unique:users',
        'cvc'=>'required|alpha_num|between:4,7',
    );
}