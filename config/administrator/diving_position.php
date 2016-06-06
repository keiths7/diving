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
    'edit_fields' => array(
        'id',
        'name',
    ),
    'columns' => array(
        'id',
        'name'
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
