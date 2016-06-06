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
        'desc' => array(
            'title' => 'desc',
            'type' => 'text'
        ),
        'value' => array(
            'title' => 'Image (200 x 150)',
            'type' => 'image',
            'naming' => 'random',
            'location' => public_path().'/uploads/originals/',
            'size_limit' => 2,
            'sizes' => array(
                array(1423, 441, 'crop', public_path() . '/uploads/resize/', 100),
            )
        ),
        'type' => array(
            'title' => 'type',
            'type' => 'enum',
            'options' => array('image', 'text')
        ),
        'position' => array(
            'title' => 'position',
            'type' => 'enum',
            'options' => ['banner', 'pop', 'dest']
        ),
        'sort',
        'is_active' => array(
            'title' => 'is_active',
            'type' => 'bool'
        ),
    ),

    'columns' => array(
        'id',
        'desc',
        'format_value' => array(
            'title' => 'value'
            ),
        'type',
        'position',
        'sort',
        'is_active'
    ),

    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),

    'filters' => array(
        'id',
        'desc' => array(
            'title' => 'desc',
        ),
    ),
);