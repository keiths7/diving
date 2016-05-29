<?php

return array(
	'title' => 'users',
	'single' => 'user',
	'model' => 'App\User',
	'edit_fields' => array(
        'id',
        'name',
        'email'
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