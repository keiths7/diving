<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/29
 * Time: 上午10:15
 */

return array(
    'title' => '语言',
    'single' => '语言',
    'model' => 'App\Language',
    'edit_fields' => array(
        'id',
        'name',
        'zh_name',
    ),
    'columns' => array(
        'id',
        'name',
        'zh_name',
    ),

    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),

    'filters' => array(
        'id',
        'name' => array(
            'title' => '语言',
        ),
    ),
);