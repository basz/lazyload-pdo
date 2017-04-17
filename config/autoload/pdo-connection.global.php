<?php

declare(strict_types=1);

return [
    'app'          => [
        'pdo_connection' => [
            'driver'   => 'pdo_mysql',
            'host'     => '127.0.0.1',
            'port'     => '3306',
            'user'     => 'root',
            'password' => 'rootyyyy',
            'dbname'   => 'testing_purposes',
            'options'  => []
        ],
    ],
    'dependencies' => [
        'delegators'    => [
            // 'pdo.connection' => [\Zend\ServiceManager\Proxy\LazyServiceFactory::class],
        ],
        'lazy_services' => [
            'class_map' => [
                'pdo.connection' => PDO::class,
            ],
        ],
    ],
];
