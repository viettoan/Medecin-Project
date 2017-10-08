<?php

return [
    'admin' => 1,
    'doctor' => 2,
    'disable' => 3,
    'patient' => 0,
    'male' => 1,
    'female' => 0,
    'contact' => [
        'pending' => 0,
        'accept' => 1,
    ],
    'category' => [
        'show' => 1,
        'hide' => 0,
        'rootCategory' => 0,
    ],
    'specialist' => [
        'show' => 1,
        'hide' => 0,
    ],
    'post' => [
        'show' => 1,
        'hide' => 0,
        // 'defaultPath' => '/images/post',
    ],
    'media' => [
        'video' => 0,
        'sliders' => [
            'hide' => 1,
            'show' => 2,
            'defaultPath' => 'images/sliders/',
        ],
        'video_intro' => [
            'show' => 3,
            'hide' => 4,
            'defaultPath' => 'video/',
        ],
    ],
];

