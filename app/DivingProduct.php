<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivingProduct extends Model
{
    //
    protected $table = 'diving_product';
    
    public function get_product($id)
    {
        $diving_product = DivingProduct::where('id', $id)->get();
        return $diving_product;
    }
}
