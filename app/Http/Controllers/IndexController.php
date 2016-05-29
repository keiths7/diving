<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CustomMeta;

use Auth;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
    	$cm = new CustomMeta();
        $result = $cm->get_index_content();
        // echo Auth::check();
        return $result;
    }

    public function test(Request $request)
    {
    	$php_info = phpinfo();
        return view('test', ['php_info' => $php_info]);
    }
}
