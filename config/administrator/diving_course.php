<?php
/**
 * Created by PhpStorm.
 * User: liushunqi
 * Date: 16/5/29
 * Time: 上午10:15
 */

return array(
    'title' => '潜水课程',
    'single' => '课程',
    'model' => 'App\DivingCourse',
    'edit_fields' => array(
        'id',
        'name',
        'level',
        'type'
    ),
    'columns' => array(
        'id',
        'name',
        'level',
        'type'
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