<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/29
 * Time: 上午10:15
 */

return array(
    'title' => '潜水商品',
    'single' => '商品',
    'model' => 'App\DivingProduct',
    'form_width' => 800,
    'edit_fields' => array(
        'id',
        'shop' => array(
            'title' => 'shop',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'positions' => array(
            'title' => 'positions',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'name',
        'type' => array(
            'title' => 'type',
            'type' => 'enum',
            'options' => array('single', 'multi', 'boat', 'direct')
        ),
        'description' => array(
            'type' => 'wysiwyg',
            'title' => 'description'
        ),
        'price',
        // 'keyword',
        // 'start_date',
        // 'end_date'
    ),
    'columns' => array(
        'id',
        'name',
        'type',
        'description',
        'price',
        // 'start_date',
        // 'end_date'
    ),

    'sort' => array(
        'field' => 'id',
        'direction' => 'asc',
    ),

    'filters' => array(
        'id',
        'name' => array(
            'title' => '课程名',
        ),
    ),
);