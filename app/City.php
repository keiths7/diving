<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class City extends Model
{
    //
    protected $table = 'city';

    public function picture()
    {
        return $this->belongsToMany('App\Source', 'city_source', 'cid', 'sid');
    }

    public function find_city($word)
    {
        $result = [];
        $query = City::where('name', 'like', '%'.$word.'%')->get();
        foreach($query as $val)
        {
            $result[] = $val->name;
        }
        return $result;
    }
}
