<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\City;
use App\DivingPosition;

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


    public function search($params)
    {
        $result = array();
        $ret = $this->judge_content($params);
        if($ret['type'] == 1)
        {
            $params['country_id'] = $ret['ret'];
            $result = $this->get_country_product($params);
        }
        elseif($ret['type'] == 2)
        {
            $params['position_ids'] = $ret['ret'];
            $result = $this->get_city_product($params);
        }
        elseif($ret['type'] == 3)
        {
            $params['position_id'] = $ret['ret'];
            $result = $this->get_postion_product($params);
        }
        else{
            // DB::connection()->enableQueryLog();
            $query = DB::table('diving_product')
                    ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                    ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                    ->select('diving_product.*');

            if(array_key_exists('price_start', $params))
            {
                $query = $query->whereBetween('price', [intval($params['price_start']), intval($params['price_end'])]);
            }
            if(array_key_exists('lang', $params) && $params['lang'])
            {
                $langs = explode('-', $params['lang']);
                $query = $query->leftJoin('shop_language', 'shop_language.sid', '=', 'diving_shop.id');
                $query = $query->whereIn('lid', $langs);
            }
            if(array_key_exists('dive_type', $params) && $params['dive_type'])
            {
                $query = $query->where('type', $params['dive_type']);
            }
            if(array_key_exists('dest', $params) && $params['dest'])
            {
                $dests = explode('-', $params['dest']);
                // $query = $query->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id');
                $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
                $query = $query->whereIn('diving_position.city', $dests);
            }
            if(array_key_exists('offer', $params) && $params['offer'])
            {
                $dests = explode('-', $params['offer']);
                $dests = array_map(function($val){return intval($val);}, $dests);
                $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
                $query = $query->whereIn('shop_dive_offer.offer', $dests);
            }
            $query = $query->groupBy('diving_product.id');
            // $result = DB::select($sql);
            $result = $query->get();
            // $queries = DB::getQueryLog(); // 获取查询日志
            // var_dump($queries); // 即可查看执行的sql，传入的参数等等
            // print_r($result);
        }
        return $result;
    }

    public function judge_content($params)
    {
        $result = array();
        //country
        $query = DB::table('country')->where('name', $params['content'])->first();
        if($query)
        {
            $result = array('type'=>1, 'ret'=>$query->id);
            return $result;
        }
        //city
        $query = DB::table('diving_position')->where('city', $params['content'])->get();
        if($query)
        {
            $result = array();
            foreach ($query as $key => $value) {
                $result[] = $value->id;
            }
            $ret = array('type'=>2, 'ret'=>$result);
            return $ret;
        }
        //position
        $query = DB::table('diving_position')->where('name', $params['content'])->first();
        if($query)
        {
            $result = array('type'=>3, 'ret'=>$query->id);
            return $result;
        }
    }

    public function get_postion_product($params)
    {
        $query = DB::table('diving_product')
                ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                ->select('diving_product.*');
        $query = $query->where('product_position.pos_id', '=', $params['position_id']);

        if(array_key_exists('price_start', $params))
        {
            $query = $query->whereBetween('price', [intval($params['price_start']), intval($params['price_end'])]);
        }
        if(array_key_exists('lang', $params) && $params['lang'])
        {
            $langs = explode('-', $params['lang']);
            $query = $query->leftJoin('shop_language', 'shop_language.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('lid', $langs);
        }
        if(array_key_exists('dive_type', $params) && $params['dive_type'])
        {
            $query = $query->where('type', $params['dive_type']);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $query = $query->groupBy('diving_product.id');
        $result = $query->get();
        $ret = array();
        foreach ($result as $key => $val) {
            $pos_info = $this->get_positions_by_id($val->id);
            // print_r($pos_info);
            foreach($pos_info as $k => $v)
            {
                // $val->city_info = City::where('name', '=', $params['content'])->first();
                $val->position_image = $this->get_position_image($v->id);
                if(array_key_exists($v->city_id, $ret)){
                    $ret[$v->city_id][] = $val;
                }else{
                    $ret[$v->city_id]  = array();
                    $ret[$v->city_id][] = $val;
                }
            }
            
        }
        // $ret = array(0=>$result);
        return $ret;
    }

    public function get_city_product($params)
    {
        $query = DB::table('diving_product')
                ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                ->select('diving_product.*');

        $query = $query->whereIn('product_position.pos_id', $params['position_ids']);

        if(array_key_exists('price_start', $params))
        {
            $query = $query->whereBetween('price', [intval($params['price_start']), intval($params['price_end'])]);
        }
        if(array_key_exists('lang', $params) && $params['lang'])
        {
            $langs = explode('-', $params['lang']);
            $query = $query->leftJoin('shop_language', 'shop_language.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('lid', $langs);
        }
        if(array_key_exists('dive_type', $params) && $params['dive_type'])
        {
            $query = $query->where('type', $params['dive_type']);
        }
        if(array_key_exists('dest', $params) && $params['dest'])
        {
            $dests = explode('-', $params['dest']);
            // $query = $query->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id');
            $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
            $query = $query->whereIn('diving_position.city', $dests);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $query = $query->groupBy('diving_product.id');
        $result = $query->get();
        // print_r($result);
        // if ($result){
        //     $city = City::where('name', '=', $params['content'])->first();
        //     foreach($result as $k => $v){
        //         $v[0]->position_image = $this->get_position_image($v->id);
        //     }
            
        //     $result[0]->city_info = $city;
        // }
        $ret = array();
        foreach ($result as $key => $val) {
            $pos_info = $this->get_positions_by_id($val->id);
            // print_r($pos_info);
            foreach($pos_info as $k => $v)
            {
                $val->city_info = City::where('name', '=', $params['content'])->first();
                $val->position_image = $this->get_position_image($v->id);
                if(array_key_exists($v->city_id, $ret)){
                    $ret[$v->city_id][] = $val;
                }else{
                    $ret[$v->city_id]  = array();
                    $ret[$v->city_id][] = $val;
                }
            }
            
        }
            
        // $ret = array($city->id => $result);
        return $ret;
    }

    public function get_country_product($params)
    {
        $query = DB::table('diving_product')
                ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                ->select('diving_product.*');

        $query = $query->where('diving_position.country_id', '=',$params['country_id']);

        if(array_key_exists('price_start', $params))
        {
            $query = $query->whereBetween('price', [intval($params['price_start']), intval($params['price_end'])]);
        }
        if(array_key_exists('lang', $params) && $params['lang'])
        {
            $langs = explode('-', $params['lang']);
            $query = $query->leftJoin('shop_language', 'shop_language.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('lid', $langs);
        }
        if(array_key_exists('dive_type', $params) && $params['dive_type'])
        {
            $query = $query->where('type', $params['dive_type']);
        }
        if(array_key_exists('dest', $params) && $params['dest'])
        {
            $dests = explode('-', $params['dest']);
            // $query = $query->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id');
            $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
            $query = $query->whereIn('diving_position.city', $dests);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $query = $query->groupBy('diving_product.id');
        $result = $query->get();
        
        $ret = array();
        foreach ($result as $key => $val) {
            $pos_info = $this->get_positions_by_id($val->id);
            // print_r($pos_info);
            foreach($pos_info as $k => $v)
            {
                $val->city_info = City::where('id', '=', $v->city_id)->first();
                $val->position_image = $this->get_position_image($v->id);
                if(array_key_exists($v->city_id, $ret)){
                    $ret[$v->city_id][] = $val;
                }else{
                    $ret[$v->city_id]  = array();
                    $ret[$v->city_id][] = $val;
                }
            }
            
        }

        return $ret;
    }

    public function get_position_info($pos_id)
    {
        $query = DB::table('diving_position')->where('id', '=', $pos_id)->first();
        return $query;
    }

    public function get_positions_by_id($pro_id)
    {
        $query = DB::table('product_position')
                    ->join('diving_position', 'diving_position.id', '=', 'product_position.pos_id')
                    ->where('pro_id', '=', $pro_id)->get();
        return $query;
    }

    public function get_position_image($pos_id)
    {
        $query = DivingPosition::where('id', $pos_id)->first();
        return '/uploads/originals/'.$query->source[0]->file;
    }
}
