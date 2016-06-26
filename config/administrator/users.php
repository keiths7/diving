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