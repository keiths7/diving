<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivingProduct extends Model
{
    //
    protected $table = 'diving_product';

    public function shop()
    {
    	return $this->hasOne('App\DivingShop','id', 'shop_id');
    }

    public function positions()
    {
    	return $this->hasMany('App\DivingPosition','id', 'position_id');
    }
    
    public function get_product($id)
    {
        $diving_product = DivingProduct::where('id', $id)->first();
        var_dump($diving_product->shop);
        return $diving_product;
    }
}
