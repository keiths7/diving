<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{
    public function get_user_info(Request $request)
    {
        $user = $request->user();
        $u = new User;
        $user_info = $u->get_user_info($user['id']);
        return $user_info;
    }

    public function update_user_info(Request $request)
    {
        $user = $request->user();
        $u = new User;
        $user_info = $u->get_user_info($user['id']);
        $params = ['gender', 'phone', 'height', 'weight', 'shoes_size', 'name'];
        foreach($params as $key) {
            if($request->has($key)) {
                $user_info->$key = $request->input($key, '');
            }
        }
        $user_info->save();
    }

    public function get_user_credit(Request $request)
    {

    }

    public function get_user_order(Request $request)
    {

    }
}