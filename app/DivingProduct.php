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
    	return $this->belongsToMany('App\DivingPosition', 'product_position','pro_id', 'pos_id');
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
        $diving_product->releated_product = $this->get_related_product($diving_product->positions[0]->city->id);
        return $diving_product;
    }

    public function format_shop_lang(&$product)
    {
        // $shop_lang = $product->shop->shop_languages();
        $lang_str = '';
        $query = DB::table('shop_language')
                    ->join('language', 'language.id', '=', 'shop_language.lid')
                    ->where('sid', '=', $product->shop_id)->get();
        foreach($query as $k => $v)
        {
            $lang_str .= ','.$v['name'];
        }
        $lang_str = trim($lang_str, ',');
        $product->lang_str = $lang_str;
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
            return $result;
        }
        elseif($ret['type'] == 2)
        {
            $params['city_id'] = $ret['ret'];
            $result = $this->get_city_product($params);
            return $result;
        }
        elseif($ret['type'] == 3)
        {
            $params['position_id'] = $ret['ret'];
            $result = $this->get_postion_product($params);
            return $result;
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
                $query = $query->whereIn('diving_position.city_id', $dests);
            }
            if(array_key_exists('offer', $params) && $params['offer'])
            {
                $dests = explode('-', $params['offer']);
                $dests = array_map(function($val){return intval($val);}, $dests);
                $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
                $query = $query->whereIn('shop_dive_offer.offer', $dests);
            }
            $query = $query->groupBy('diving_product.id')->skip($params['page']*$params['per_page'])->take($params['per_page']);
            // $result = DB::select($sql);
            $result = $query->get();
            // $queries = DB::getQueryLog(); // 获取查询日志
            // var_dump($queries); // 即可查看执行的sql，传入的参数等等
            $ret = array();
            foreach ($result as $key => $val) {
                $pos_info = $this->get_positions_by_id($val['id']);
                // print_r($pos_info);
                foreach($pos_info as $k => $v)
                {
                    $val['city_info'] = City::where('id', '=', $v['city_id'])->first()->toArray();
                    $val['position_image'] = $this->get_position_image($v['id']);
                    if(array_key_exists($v['city_id'], $ret)){
                        $ret[$v['city_id']][] = $val;
                    }else{
                        $ret[$v['city_id']]  = array();
                        $ret[$v['city_id']][] = $val;
                    }
                }
                
            }
            // print_r($result);
        }
        return $ret;
    }

    public function judge_content($params)
    {
        $result = array();
        if(empty($params['content']))
        {
            return 0;
        }
        //country
        $query = DB::table('country')->where('name', $params['content'])->first();
        if($query)
        {
            $result = array('type'=>1, 'ret'=>$query['id']);
            return $result;
        }
        //city
        $query = DB::table('city')->where('name', $params['content'])->first();
        if($query)
        {
//            $result = array();
//            foreach ($query as $key => $value) {
//                $result[] = $value->id;
//            }
            $ret = array('type'=>2, 'ret'=>$query['id']);
            return $ret;
        }
        //position
        $query = DB::table('diving_position')->where('name', $params['content'])->first();
        if($query)
        {
            $result = array('type'=>3, 'ret'=>$query['id']);
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
        $query = $query->groupBy('diving_product.id')->skip($params['page']*$params['per_page'])->take($params['per_page']);;
//         $result = $query->get();
//         $ret = array();
//         foreach ($result as $key => $val) {
// //            $pos_info = $this->get_positions_by_id($val->id);
//             // print_r($pos_info);

//             $pos_info = DivingPosition::where('id', '=', $params['position_id'])->first();
//             $val->position_image = $this->get_position_image($pos_info->city_id);
//             if(array_key_exists($pos_info->city_id, $ret)){
//                 $ret[$pos_info->city_id][] = $val;
//             }else{
//                 $ret[$pos_info->city_id]  = array();
//                 $ret[$pos_info->city_id][] = $val;
//             }
            
//         }
//         // $ret = array(0=>$result);
//         return $ret;
        //============================================ new version =========================================
        $result = $query->get();
        $ret = array();
        foreach ($result as $key => $val) {
//            $pos_info = $this->get_positions_by_id($val->id);
            // print_r($pos_info);

            $pos_info = DivingPosition::where('id', '=', $params['position_id'])->first();
            $val['position_image'] = $this->get_position_image($pos_info['city_id']);
            if(array_key_exists($pos_info['city_id'], $ret)){
                $ret[$pos_info['city_id']][] = $val;
            }else{
                $ret[$pos_info['city_id']]  = array();
                $ret[$pos_info['city_id']][] = $val;
            }
            
        }
        // $ret = array(0=>$result);
        return $ret;
        //============================================ new version =========================================
    }

    public function get_city_product($params)
    {
        // var_dump($params);
        $query = DB::table('diving_product')
                ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                ->select('diving_product.*');

        $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
        $query = $query->where('diving_position.city_id', $params['city_id']);

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
            $query = $query->whereIn('diving_position.city_id', $dests);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $query = $query->groupBy('diving_product.id')->skip($params['page']*$params['per_page'])->take($params['per_page']);;
//         $result = $query->get();
//         // print_r($result);
//         // if ($result){
//         //     $city = City::where('name', '=', $params['content'])->first();
//         //     foreach($result as $k => $v){
//         //         $v[0]->position_image = $this->get_position_image($v->id);
//         //     }
            
//         //     $result[0]->city_info = $city;
//         // }
//         $ret = array();
//         foreach ($result as $key => $val) {
//             $pos_info = DB::table('diving_position')->where('city_id', '=', $params['city_id'])->first();
//             // print_r($pos_info);
// //            var_dump($params['city_id']);
//             if(!isset($ret[$params['city_id']])) {
//                 $ret[$params['city_id']]  = array();
//             }
            
//             $val->city_info = City::where('id', '=', $params['city_id'])->first();
//             $val->position_image = $this->get_position_image($pos_info->id);
//             $ret[$params['city_id']][] = $val;
// //            $ret = array($params['city_id'] => $val);
// //            foreach($pos_info as $k => $v)
// //            {
// //                $val->city_info = City::where('id', '=', $params['city_id'])->first();
// //                $val->position_image = $this->get_position_image($v->id);
// //                if(array_key_exists($v->city_id, $ret)){
// //                    $ret[$v->city_id][] = $val;
// //                }else{
// //                    $ret[$v->city_id]  = array();
// //                    $ret[$v->city_id][] = $val;
// //                }
// //            }
            
//         }
//           // var_dump($ret);  
//         // $ret = array($city->id => $result);
//         return $ret;
        //============================================ new version =========================================
        $result = $query->get();
        $ret = array();
        foreach ($result as $key => $val) {
            $pos_info = DB::table('diving_position')->where('city_id', '=', $params['city_id'])->first();
            if(!isset($ret[$params['city_id']])) {
                $ret[$params['city_id']]  = array();
            }
            
            $val['city_info'] = City::where('id', '=', $params['city_id'])->first()->toArray();
            $val['position_image'] = $this->get_position_image($pos_info['id']);
            $ret[$params['city_id']][] = $val;
        }
          // var_dump($ret);  
        return $ret;
        
        //============================================ new version =========================================
    }

    /**
     *1.get city count
     *2.base city find product
     **/
    public function get_country_product($params)
    {
        $city_ids = $this->get_country_city_id($params['country_id'], $params['page'], $params['per_page']);
        $query = DB::table('diving_product')
                ->join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
            ->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id')
                ->select('diving_product.*', 'diving_position.city_id', 'diving_position.id as pos_id');

//        $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
        // $query = $query->where('diving_position.country_id', '=',$params['country_id']);
                // $query = $query->whereIn('diving_position.city_id', $city_ids);

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
            $query = $query->whereIn('diving_position.city_id', $dests);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $result = array();
        foreach($city_ids as $c) {
            $query_sub = $query->where('diving_position.city_id', $c);
            $query_sub = $query_sub->groupBy('diving_product.id')->take(3);
            $result = array_merge($result, $query_sub->get());
        }
        
//         $result = $query->get();
        
//         $ret = array();
//         foreach ($result as $key => $val) {
// //            $pos_info = $this->get_positions_by_id($val->id);
// //            $city_info = DB::table('diving_position')->where('country_id', '=', $params['country_id'])->groupBy('city_id')->get();
// //            print_r($city_info);
//             $val->city_info = City::where('id', '=', $val->city_id)->first();
//             $val->city_info->image = $this->get_city_image($val->city_id);
//             $val->position_image = $this->get_position_image($val->pos_id);
//             if(array_key_exists($val->city_id, $ret)){
//                 $ret[$val->city_id][] = $val;
//             }else{
//                 $ret[$val->city_id]  = array();
//                 $ret[$val->city_id][] = $val;
//             }
//             // print_r($pos_info);
// //            foreach($city_info as $k => $v)
// //            {
// //                $val->city_info = City::where('id', '=', $v->city_id)->first();
// //                $val->position_image = $this->get_position_image($v->id);
// //                if(array_key_exists($v->city_id, $ret)){
// //                    $ret[$v->city_id][] = $val;
// //                }else{
// //                    $ret[$v->city_id]  = array();
// //                    $ret[$v->city_id][] = $val;
// //                }
// //            }
            
//         }

//         return $ret;
        //============================================ new version =========================================
        // $result = $query->get();
        
        $ret = array();
        foreach ($result as $key => $val) {
            $val['city_info'] = City::where('id', '=', $val['city_id'])->first()->toArray();
            $val['city_info']['image'] = $this->get_city_image($val['city_id']);
            $val['position_image'] = $this->get_position_image($val['pos_id']);
            if(array_key_exists($val['city_id'], $ret)){
                $ret[$val['city_id']][] = $val;
            }else{
                $ret[$val['city_id']]  = array();
                $ret[$val['city_id']][] = $val;
            }
        }

        return $ret;
        //============================================ new version =========================================
    }

    public function get_country_city_id($cid, $offset=0, $limit=20) {
        $query = DivingPosition::
                    where('diving_position.country_id', $cid)
                    ->groupBy('diving_position.city_id')
                    ->skip($offset)->take($limit)->get();
        if($query) {
            $result = array();
            foreach($query as $val)
            {
                $result[] = $val->id;
            }
            // return $query->toArray();
            return $result;
        }
        return $query;
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


    public function get_related_product($city_id)
    {
        $query = DB::table('diving_product')
                    ->leftJoin('product_position', 'diving_product.id', '=', 'product_position.pro_id')
                    ->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id')
                    // ->groupBy('diving_product.id')
                    ->where('diving_position.city_id', '=', $city_id)->take(3)->get();
        foreach($query as $k => $v)
        {
            $query[$k]['position_image'] = $this->get_position_image($v['pos_id']);
        }
        return $query;
    }

    public function get_city_image($city_id)
    {
        $query = DB::table('city_source')
                    ->leftJoin('source', 'city_source.sid', '=', 'source.id')->where('cid', '=', $city_id)->get();
        $images = array();
        foreach($query as $val)
        {
            array_push($images, '/uploads/originals/'.$val['file']);
        }

        return $images;
    }

    public function get_more_product($params)
    {
        $query = /*DB::table('diving_product')*/
                DivingProduct::
                join('diving_shop', 'diving_shop.id', '=', 'diving_product.shop_id')
                ->leftJoin('product_position', 'product_position.pro_id', '=', 'diving_product.id')
                ->select('diving_product.*');

        if(array_key_exists('city_id', $params))
        {
            $city_id = $params['city_id'];
            $query = $query->leftJoin('diving_position', 'diving_position.id', '=', 'product_position.pos_id');
            $query = $query->where('diving_position.city_id', $params['city_id']);
        }
        if(array_key_exists('position_id', $params)){
            $position_id = $params['position_id'];
            $query = $query->where('product_position.pos_id', '=', $params['position_id']);
        }
        //////////////////////////////////////////////////
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
            $query = $query->whereIn('diving_position.city_id', $dests);
        }
        if(array_key_exists('offer', $params) && $params['offer'])
        {
            $dests = explode('-', $params['offer']);
            $dests = array_map(function($val){return intval($val);}, $dests);
            $query = $query->leftJoin('shop_dive_offer', 'shop_dive_offer.sid', '=', 'diving_shop.id');
            $query = $query->whereIn('shop_dive_offer.offer', $dests);
        }
        $page = $params['page'];
        if($page == 0) {
            $next_page = 4;
        } else {
            $next_page = $page * $params['per_page'];
        }
        $query = $query->groupBy('diving_product.id')->skip($next_page)->take($params['per_page']);;
        $query = $query->get()->toArray();
        // $result = array();
        foreach ($query as $key => $val) {
            $pos_info = $this->get_positions_by_id($val['id']);
            $query[$key]['position_image'] = $this->get_position_image($pos_info[0]['id']);
        }
        // print_r($query);
        // $result = array();
        return $query;
    }

    // public function get_destination($country_id)
    // {
    //     $query = DB::table('')
    // }
}
