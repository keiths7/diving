<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/29
 * Time: 上午10:14
 */

return array(
    'title' => '潜点',
    'single' => '潜点',
    'model' => 'App\DivingPosition',
    'form_width' => 800,
    'edit_fields' => array(
        'id',
        'name',
        'source' => array(
            'title' => 'img',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'country',
        'province',
        'city',
        'location',
        'location_x',
        'location_y',
        'dive_method',
        'water_temparate',
        'depth',
        'dive_types',
        'visibility',
        'best_dive_period',
        'description' => array(
            'type' => 'wysiwyg',
            'title' => 'description'
        ),
        'what_to_see'
    ),
    'columns' => array(
        'id',
        'name',
        'source' => array(
            'title' => 'img',
            'relationship' => 'source',
            'select' => 'GROUP_CONCAT(file)',
            'output'=> function($value){
                
                $val = explode(',', $value);
                $ret  = '';
                foreach($val as $value) {
                    $ret .= "<image src='/uploads/originals/".$value."' width='100px'>";
                }
                return $ret;
            }
        ),
        'country',
        'province',
        'city',
        'location',
        'location_x',
        'location_y',
        'dive_method',
        'water_temparate',
        'depth',
        'dive_types',
        'visibility',
        'best_dive_period',
        'description',
        'what_to_see'
    ),
    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),
    'filters' => array(
        'id',
        'name' => array(
            'title' => '潜点',
        ),
    ),
);
