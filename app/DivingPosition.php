<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivingPosition extends Model
{
    //
    protected $table = 'diving_position';

    public function source()
    {
    	return $this->belongsToMany('App\Source', 'position_source', 'pid', 'sid');
    }

    public function country()
    {
    	return $this->belongsTo('App\Country', 'country_id','id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id','id');
    }
}
