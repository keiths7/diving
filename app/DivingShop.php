<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivingShop extends Model
{
    //
    protected $table = 'diving_shop';

    public function source()
    {
    	return $this->belongsToMany('App\Source', 'position_source', 'pid', 'sid');
    }

    public function products()
    {
        return $this->hasMany('App\DivingProduct');
    }
}
