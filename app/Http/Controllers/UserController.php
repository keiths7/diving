<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserOrder;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Crypt;
use Mail;

class UserController extends Controller
{

    public function __construct() {
        // $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function get_user_info(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
        }
        $user = $request->user();
        $u = new User;
        $user_info = $u->get_user_info($user['id']);
        return $user_info->toArray();
    }

    public function update_user_info(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
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
        return json_encode(['code'=>0, 'message'=>'success']);
    }

    public function update_user_pay(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
        }
        $user = $request->user();
        $u = new User;
        $ret = $u->get_pay_info($user['id']);
        $params = ['card_number', 'valid_thru', 'cvc'];
        if($ret){
            foreach($params as $key) {
                if($request->has($key)) {
                    $ret->$key = $request->input($key, '');
                }
            }
            $ret->save();
        } else {
            $card_number = $request->input('card_number', '');
            $valid_thru = $request->input('valid_thru', '');
            $cvc = $request->input('cvc', '');
            $u->add_pay_info($user['id'], $card_number, $valid_thru, $cvc);
        }
        return json_encode(['code'=>0, 'message'=>'success']);
    }

    public function get_user_credit(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
        }
        $login_user = $request->user();
        $user = new User();
        $ret = $user->get_pay_info($login_user['id'], true);
        return json_encode($ret);
    }

    public function get_user_order(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
        }
        $user = $request->user();
        $user_order = new UserOrder();
        $orders = $user_order->get_order($user['id']);
        return json_encode(['code'=>0, 'message'=>'success', 'orders'=>$orders]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 认证通过...
            // return redirect()->intended('/');
            $user = Auth::user();
            $u = new User;
            $user_info = $u->get_user_info($user['id']);
            // print_r($user_info);
            return json_encode(['code'=>0, 'message'=>'success', 'user'=>$user_info->toArray()]);
        }
        else
        {
            // return redirect()->intended('/');
            return json_encode(['code'=>1, 'message'=>'failed']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return json_encode(['code'=>0, 'message'=>'success']);
    }

    public function is_logined(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $u = new User;
            $user_info = $u->get_user_info($user['id']);
            return json_encode(['code'=>0, 'message'=>'yes', 'user'=>$user_info->toArray()]);
        }
        return json_encode(['code'=>1, 'message'=>'no']);
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

            return json_encode(['code'=>0, 'message'=>'success']);
            // return Redirect::to('/')->with('message', '欢迎注册，好好玩耍!');
        } else {
            // echo $validator->messages();
            // return $validator->messages();
            return json_encode(['code'=>1, 'message'=>$validator->messages()->first()]);
            // return Redirect::to('user/register')->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
        }
    }

    public function init_password(Request $request)
    {
        if (!Auth::check()) {
            return json_encode(['code'=>3, 'message'=>'not logined']);
        }
        $login_user = $request->user();
        $validator = Validator::make(Input::all(), User::$reset_pwd_rules);

        if($validator->passes()) {
            $user = User::where('id', '=', $login_user['id'])->first();
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return json_encode(['code'=>0, 'message'=>'success']);
        } else {
            return json_encode(['code'=>1, 'message'=>$validator->messages()->first()]);
        }
    }

    public function user_profile(Request $request)
    {
        return view('profile');
    }


    public function reset_email(Request $request)
    {
        $email = $request->input('email', '');
        $user = User::where('email', $email)->first();
        if(!$user) {
            return json_encode(['code'=>2, 'message'=>'user not found']);
        }
        $rand_str = time();
        $encrypt_str = Crypt::encrypt($email.':'.$rand_str);
        $name = '重置密码邮件';
        $flag = Mail::send('emails.reset_email',['user'=>$user, 'secret'=>$encrypt_str],function($message) use ($user){
            $to = $user->email;
            $message ->to($to)->subject('dreamdivingtrip重置密码邮件');
        });
        // echo $user->email;
        // var_dump($flag);
        if($flag){
            return json_encode(['code'=>0, 'message'=>'sucess']);
        }else{
            return json_encode(['code'=>1, 'message'=>'failed']);
        }
    }

    public function reset_password(Request $request)
    {
        $pwd = $request->input('password', '');
        $repeat_pwd = $request->input('password_confirmation', '');
        $token = $request->input('token', '');
        if(!$token) {
            return json_encode(['code'=>3, 'message'=>'params error']);
        }

        $decode_str = Crypt::decrypt($token);
        if(!$decode_str) {
            return json_encode(['code'=>4, 'message'=>'token error']);
        }

        $decode_arr = explode(':', $decode_str);

        if($pwd && $repeat_pwd && $pwd == $repeat_pwd) {
            $validator = Validator::make(Input::all(), User::$reset_pwd_rules);
            if($validator->passes()) {
                $user = User::where('email', $decode_arr[0])->first();
                if(!$user) {
                    return json_encode(['code'=>4, 'message'=>'token error']);
                }
                $user->password = Hash::make($pwd);
                $user->save();
                return json_encode(['code'=>0, 'message'=>'sucess']);
            }
            return json_encode(['code'=>1, 'message'=>'failed']);
        } else {
            return view('resetpwd', ['token'=>$token]);
        }
    }
}