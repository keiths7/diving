<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    //
    protected $table = 'source';

    public function getFormatValueAttribute()
    {
    	if($this->getAttribute('type') == 'image')
    		return '<img src="/uploads/originals/'.$this->getAttribute('file').'" height="100" />';
    	else
    		return $this->getAttribute('file');
    }
}
