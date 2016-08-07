<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'city';

    public function picture()
    {
    	return $this->belongsToMany('App\Source', 'city_source', 'cid', 'sid');
    }
}
