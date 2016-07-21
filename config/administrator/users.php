<?php

return array(
	'title' => '用户',
	'single' => '用户',
	'model' => 'App\User',
	'edit_fields' => array(
        'id',
        'name',
        'email',
        'phone',
        'gender',
        'height',
        'weight',
        'shoes_size',
        'admin' => array(
            'title' => 'is_admin',
            'type' => 'bool'
        )
    ),

    'columns' => array(
        'id',
        'name',
        'email'
    ),

    'filters' => array(
        'id',
        'name',
        'email'
    ),
);