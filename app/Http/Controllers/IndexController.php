<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CustomMeta;
use App\DivingProduct;

use Auth;

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

    public function test(Request $request)
    {
    	$php_info = phpinfo();
        return view('test', ['php_info' => $php_info]);
    }
}
