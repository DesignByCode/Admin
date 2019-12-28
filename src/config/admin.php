<?php

return [

    'auth' => [
        'name' => env('ADMIN_USER_NAME'),
        'email' => env('ADMIN_USER_EMAIL'),
        'password' => env('ADMIN_USER_PASSWORD'),
    ],
    'img' => [
        'icon' => [
            'width' => 50,
            'height' => 50
        ],
        'thumbnail' => [
            'width' => 200,
            'height' => 200
        ],
        'card' => [
            'width' => 800,
            'height' => 600
        ],
        'tall' => [
            'width' => 300,
            'height' => 550
        ],
        'wide' => [
            'width' => 1024,
            'height' => 768
        ]
    ]

];
