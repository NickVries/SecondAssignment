<?php

return [
    'database' => [
        'name'       => 'SecondAssignment',
        'username'   => 'root',
        'password'   => 'root',
        'connection' => 'mysql:host=127.0.0.1',
        'options'    => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ],
    ],
    'providers' => [
        \App\Providers\AppServiceProvider::class,
    ]
];
