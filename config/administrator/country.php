<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/22
 * Time: 下午10:32
 */

return array(
    'title' => '国家',

    'single' => '国家',

    'model' => 'App\Country',

    'edit_fields' => array(
        'name',
        'picture' => array(
            'title' => 'picture',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'description'
    ),

    'columns' => array(
        'id',
        'name',
        'picture' => array(
            'title' => 'img',
            'relationship' => 'picture',
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
        'description',
    ),

    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),

    'filters' => array(
        'id',
        'name' => array(
            'title' => 'desc',
        ),
    ),
);