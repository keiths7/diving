<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CustomMeta;
use App\DivingProduct;
use App\Country;
use App\City;
use App\DivingPosition;
use App\UserOrder;

use Auth;
use DB;
use Mail;

use Validator;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
    	$cm = new CustomMeta();
        $result = $cm->get_index_content();
        // echo Auth::check();
        // print_r($result);
        return view('index', $result);
    }

    public function product(Request $request, $id)
    {
        $product = new DivingProduct();
        $result = $product->get_product($id);
        $params = $request->all();
        $params['date_start'] = $request->get('date_start', '');
        $params['date_end'] = $request->get('date_end', '');
        $params['passenger'] = $request->get('passenger', 1);
        // print_r($params);
        // var_dump($result->shop->name);
        return view('product', ['product'=>$result, 'params'=>$params]);
    }

    public function search(Request $request)
    {
        $params = array();
        $params['date_start'] = $request->input('date_start', '');
        $params['date_end'] = $request->input('date_end', '');
        $params['dive_type'] = $request->input('dive_type', '');
        $params['price_start'] = $request->input('price_start', 0);
        $params['price_end'] = $request->input('price_end', 99999);
        $params['lang'] = $request->input('lang', '');
        $params['dest'] = $request->input('dest', '');
        $params['offer'] = $request->input('offer', '');
        $params['content'] = $request->input('destination', '');
        $params['page'] = $request->input('page', 0);
        $params['page'] = $params['page']-1;
        if($params['page'] < 0)
        {
            $params['page'] = 0;
        }
        $params['per_page'] = 10;

        $products = new DivingProduct();
        $result = $products->search($params);
//         print_r($result);
        return view('search', ['result'=>$result]);
    }

    public function country_word(Request $request)
    {
        $word = $request->input('word', '');
        if(empty($word)){
            return '{}';
        }
        $result = array();
        $country = new Country();
        $query = $country->find_country($word);
        if($query){
            return json_encode($query);
        }
        $city = new City();
        $query = $city->find_city($word);
        if($query){
            return json_encode($query);
        }
        $pos = new DivingPosition();
        $query = $pos->find_position($word);
        if($query){
            return json_encode($query);
        }
        return json_encode($result);
    }

    public function new_order(Request $request)
    {
        if (!Auth::check()) {
            return '{}';
        }
        $user = $request->user();
        $validator = Validator::make(Input::all(), UserOrder::$rules);

        if($validator->passes()) {
            $order = new UserOrder;
            $params = array_merge(Input::all(), $request->user()->toArray());
            // print_r($params);
            $result = $order->new_order($params);
            if($result) {
                return json_encode(['code'=>0, 'message'=>'success']);
            }
            return json_encode(['code'=>1, 'message'=>'failed']);
        }
        return json_encode(['code'=>1, 'message'=>$validator->messages()->first()]);

    }

    public function get_more_product(Request $request)
    {
        $params = array();
        $params['date_start'] = $request->input('date_start', '');
        $params['date_end'] = $request->input('date_end', '');
        $params['dive_type'] = $request->input('dive_type', '');
        $params['price_start'] = $request->input('price_start', '');
        $params['price_end'] = $request->input('price_end', '');
        $params['lang'] = $request->input('lang', '');
        $params['dest'] = $request->input('dest', '');
        $params['offer'] = $request->input('offer', '');
        $params['content'] = $request->input('destination', '');
        $params['page'] = $request->input('page', 0);
        $params['page'] = $params['page']-1;
        if($params['page'] < 0)
        {
            $params['page'] = 0;
        }
        $params['per_page'] = 9;

        $products = new DivingProduct();
        $result = $products->get_more_product($params);
//         print_r($result);
        return view('search', ['result'=>$result]);
    }

    public function test_mail(Request $request)
    {
        $name = '王宝花';
        $flag = Mail::send('emails.test',['name'=>$name],function($message){
            $to = '53307709@qq.com';
            $message ->to($to)->subject('53307709de邮件测试');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

    // public function test(Request $request)
    // {
    //     $products = DivingProduct::all();
    //     foreach ($products as $key => $val) {
    //         $country = Country::where('name', $val['country'])->first();
    //         $products[$key]->country_id = $country->id;
    //     }
    // 	$php_info = phpinfo();
    //     return view('test', ['php_info' => $php_info]);
    // }
    // 
}
