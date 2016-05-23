<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $php_info = phpinfo();
        return view('test', ['php_info' => $php_info]);
    }
}
