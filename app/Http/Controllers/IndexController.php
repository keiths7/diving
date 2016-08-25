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
        // var_dump($result->shop->name);
        return view('product', ['product'=>$result]);
    }

    public function search(Request $request)
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
            $result = $order->new_order(Input::all());
            if($result) {
                return;
            }
        }
        return;

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
}
