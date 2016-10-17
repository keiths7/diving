<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomMeta extends Model
{
    //
    protected $table = 'custom_meta';
    // public $timestamps = false;

    public function getFormatValueAttribute()
    {
    	if($this->getAttribute('type') == 'image')
    		return '<img src="/uploads/originals/'.$this->getAttribute('value').'" height="100" />';
    	else
    		return $this->getAttribute('value');
    }

    public function get_index_content()
    {
    	$ret = CustomMeta::where('is_active', 1)->orderBy('sort', 'asc')->get();
    	$result = array();
    	foreach ($ret as $key => $value) {
    		if(!isset($result[$value['position']]))
    		{
    			$result[$value['position']] = array();
    		}
			$result[$value['position']][] = array(
    			'desc' => $value['desc'],
    			'image_url' => '/uploads/originals/'.$value['value'],
                'sort' => $value['sort'],
                'url' => $value['url']
    		);
    	}
    	return $result;
    }

    public function get_more_populer()
    {
        $ret = CustomMeta::where('is_active', 1)->where('position', 'pop')->orderBy('sort', 'asc')->skip(3)->take(100)->get();
        $result = array();
        foreach ($ret as $key => $value) {
            $result[] = array(
                'desc' => $value['desc'],
                'image_url' => '/uploads/originals/'.$value['value'],
                'sort' => $value['sort'],
                'url' => $value['url']
            );
        }
        return $result;
    }
}
