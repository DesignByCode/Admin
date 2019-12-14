<?php

return [

    'auth' => [
        'name' => env('ADMIN_USER_NAME'),
        'email' => env('ADMIN_USER_EMAIL'),
        'password' => env('ADMIN_USER_PASSWORD'),
    ],
    'img' => [
        'thumbnail' => [
            'width' => 200,
            'heihgt' => 200
        ],
        'card' => [
            'width' => 800,
            'height' => 600
        ]
    ]

];
