<?php

return array(
	'title' => '用户订单',
	'single' => '用户订单',
	'model' => 'App\UserOrder',
	'edit_fields' => array(
        'id',
        'user' => array(
            'title' => 'user',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'product' => array(
            'title' => 'product',
            'type' => 'relationship',
            'name_field' => 'name',
        ),
        'type',
        'start_date',
        'end_date',
        'divers',
        'money',
        'is_paid',
        'paytime',
    ),

    'columns' => array(
        'id',
        'user' => array(
            'title' => 'user',
            'relationship' => 'user',
            'select' => '(:table).name'
        ),
        'product' => array(
            'title' => 'product',
            'relationship' => 'product',
            'select' => '(:table).name'
        ),
        'type',
        'start_date',
        'end_date',
        'divers',
        'money',
        'is_paid',
        'paytime',
        'discount',
        'need_pay'
    ),

    'filters' => array(
        'id',
        'name'
    ),
);