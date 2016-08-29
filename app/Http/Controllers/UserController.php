<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;

class UserController extends Controller
{

    public function __construct() {
        // $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function get_user_info(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
        $user = $request->user();
        $u = new User;
        $user_info = $u->get_user_info($user['id']);
        return $user_info;
    }

    public function update_user_info(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
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

    public function update_user_pay(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
        $user = $request->user();
        $u = new User;
        $ret = $user->get_pay_info($user['id']);
        $params = ['card_number', 'valid_thru', 'cvc'];
        foreach($params as $key) {
            if($request->has($key)) {
                $ret->$key = $request->input($key, '');
            }
        }
        $ret->save();
    }

    public function get_user_credit(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
        $login_user = $request->user();
        $user = new User();
        $ret = $user->get_pay_info($login_user['id']);
        return json_encode($ret);
    }

    public function get_user_order(Request $request)
    {

    }

    public function login(Request $request)
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 认证通过...
            // return redirect()->intended('/');
            echo 'ok';
        }
        else
        {
            // return redirect()->intended('/');
            echo 'failed';
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
    }

    public function is_logined(Request $request)
    {
        if (Auth::check()) {
            echo 'yes';
        }
        echo 'no';
    }

    public function register(Request $request)
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;//实例化User对象
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            echo 'ok';
            // return Redirect::to('/')->with('message', '欢迎注册，好好玩耍!');
        } else {
            echo $validator->messages();
            echo 'failed';
            // return Redirect::to('user/register')->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
        }
    }

    public function init_password(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
        $login_user = $request->user();
        $validator = Validator::make(Input::all(), User::$reset_pwd_rules);

        if($validator->passes()) {
            $user = User::where('id', '=', $login_user['id'])->first();
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            echo 'ok';
        } else {
            echo $validator->messages();
            echo 'failed';
        }
    }

    public function user_profile(Request $request)
    {
        return view('profile');
    }
}