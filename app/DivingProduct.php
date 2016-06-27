<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DivingProduct extends Model
{
    //
    protected $table = 'diving_product';

    public function shop()
    {
    	return $this->belongsTo('App\DivingShop', 'shop_id','id');
    }

    public function positions()
    {
    	return $this->hasMany('App\DivingPosition','id', 'position_id');
    }
    
    public function get_product($id)
    {
        $diving_product = DivingProduct::where('id', $id)->first();
        // print_r($diving_product->positions);
         
        return $diving_product;
    }

    // public function __destruct(){
    //     DB::listen(function($sql) {
    //             dump($sql);
    //             // echo $sql->sql;
    //             // dump($sql->bindings);
    //         });
    // }
}
