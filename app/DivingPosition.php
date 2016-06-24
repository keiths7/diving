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
}
