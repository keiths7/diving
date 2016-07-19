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
        $main_info = $this->format_type_normal($diving_product);
        // print_r($main_info);
        $diving_product->main_info = $main_info;
        $this->format_shop_lang($diving_product);
        // print_r($diving_product->positions[0]->source);
        return $diving_product;
    }

    public function format_shop_lang(&$product)
    {
        $shop_lang = $product->shop->shop_languages();
        $lang_str = '';
        
        // foreach($shop_lang as $key => $val)
        // {
        //     $lang_str .= $val['name'].',';
        // }
        // $product->shop->shop_lang = $lang_str;
    }


    // public function __destruct(){
    //     DB::listen(function($sql) {
    //             dump($sql);
    //             // echo $sql->sql;
    //             // dump($sql->bindings);
    //         });
    // }
    // 
    public function format_type_normal($product)
    {
        $positions = $product->positions;
        $main_info = array();
        foreach($positions as $val)
        {
            $main_info[] = array(
                'Access' => '',
                'Time access' => '',
                'Current' => '',
                'Water temp' => $val->water_temparate,
                'Depth' => $val->depth,
                'Dive type' => $val->dive_type,
                'Visibility' => $val->visibility,
                'Best dive period' => $val->best_dive_period,
                'What to see' => $val->what_to_see
            );

        }
        
        return $main_info;
    }

    public function format_type_boat($product)
    {
        $main_info = array(
            'Access' => '',
            'Time access' => '',
            'Current' => '',
            'Water temp' => '',
            'Depth' => '',
            'Dive type' => '',
            'Visibility' => '',
            'Best dive period' => '',
            'What to see' => ''
        );
    }
}
