<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/22
 * Time: 下午10:32
 */

return array(
    'title' => '首页设置',

    'single' => 'meta',

    'model' => 'App\CustomMeta',

    'edit_fields' => array(
        'key' => array(
            'title' => 'key',
            'type' => 'text'
        ),
        'val' => array(
            'title' => 'value',
            'type' => 'text'
        ),
        'attr' => array(
            'title' => 'attr',
            'type' => 'text'
        ),
    ),

    'columns' => array(
        'id',
        'key',
        'val',
        'attr'
    ),

    'sort' => array(
        'field' => 'id',
        'direction' => 'desc',
    ),

    'filters' => array(
        'id',
        'key' => array(
            'title' => 'key',
        ),
        'val' => array(
            'title' => 'val',
            'type' => 'text' .
                '',
        ),
    ),
);