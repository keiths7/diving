<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Language;

class DivingShop extends Model
{
    //
    protected $table = 'diving_shop';

    public function source()
    {
    	return $this->belongsToMany('App\Source', 'shop_source', 'spid', 'sid');
    }

    public function shop_languages()
    {
        return $this->belongsToMany('App\Language', 'shop_language', 'sid', 'lid');
    }

    // public function shop_lang()
    // {
    //     $langs = Language::where();

    //     $lang_str = '';
    //     // print_r($langs);exit;
    //     foreach($langs as $key => $val)
    //     {
    //         $lang_str .= $val['name'].',';
    //     }
    //     return $lang_str;
    // }
}
