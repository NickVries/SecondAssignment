<?php

return [
    'database' => [
        'name'       => 'second_assignment',
        'username'   => 'root',
        'password'   => 'root',
        'connection' => 'mysql:host=mysql',
        'options'    => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],
    'providers' => [
        \App\Providers\AppServiceProvider::class,
    ]
];
