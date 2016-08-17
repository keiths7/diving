<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table = 'country';

    public function picture()
    {
    	return $this->belongsToMany('App\Source', 'country_source', 'cid', 'sid');
    }

    public function find_country($word)
    {
    	$result = [];
    	$query = Country::where('name', 'like', '%'.$word.'%')->get();
    	foreach($query as $val)
    	{
    		$result[] = $val->name;
    	}
    	return $result;
    }
}
