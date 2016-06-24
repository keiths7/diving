<?php

return array(
    'title' => 'source',
    'single' => 'source',
    'model' => 'App\Source',
    'edit_fields' => array(
        'id',
        'name',
        'file' => array(
            'title' => 'Image (200 x 150)',
            'type' => 'image',
            'naming' => 'random',
            'location' => public_path().'/uploads/originals/',
            'size_limit' => 2,
            'sizes' => array(
                array(1423, 441, 'crop', public_path() . '/uploads/resize/', 100),
            )
        ),
        'desc',
        'type',
        'format',
        'height',
        'width',
        'md5'
    ),

    'columns' => array(
        'id',
        'name',
        'format_value' => array(
            'title' => 'file'
            ),
        'desc',
        'type',
        'format',
        'height',
        'width',
        'md5'
    ),

    'filters' => array(
        'id',
        'name',
        'file'
    ),
);