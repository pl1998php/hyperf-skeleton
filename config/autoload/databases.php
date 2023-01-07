<?php

declare(strict_types=1);

use App\Enum\DatabaseEnum;
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    DatabaseEnum::ADMIN_CONNECTION => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_ADMIN_HOST', 'localhost'),
        'port' => env('DB_ADMIN_PORT', 3306),
        'database' => env('DB_ADMIN_DATABASE', 'hyperf'),
        'username' => env('DB_ADMIN_USERNAME', 'root'),
        'password' => env('DB_ADMIN_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'utf8mb4'),
        'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
        'prefix' => env('DB_PREFIX', ''),
        'pool' => [
            'min_connections' => 1,
            'max_connections' => 10,
            'connect_timeout' => 10.0,
            'wait_timeout' => 3.0,
            'heartbeat' => -1,
            'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
        ],
        'cache' => [
            'handler' => Hyperf\ModelCache\Handler\RedisHandler::class,
            'cache_key' => '{mc:%s:m:%s}:%s:%s',
            'prefix' => 'admin',
            'ttl' => 3600 * 24,
            'empty_model_ttl' => 600,
            'load_script' => true,
        ],
        'commands' => [
            'gen:model' => [
                'path' => 'app/Model/Admin',
                'force_casts' => true,
                'inheritance' => 'Model',
                'uses' => '',
                'table_mapping' => [],
            ],
        ],
    ],
    DatabaseEnum::SHOP_CONNECTION => [
        'driver' => env('DB_DRIVER', 'mysql'),
        'host' => env('DB_SHOP_HOST', 'localhost'),
        'port' => env('DB_SHOP_PORT', 3306),
        'database' => env('DB_SHOP_DATABASE', 'hyperf'),
        'username' => env('DB_SHOP_USERNAME', 'root'),
        'password' => env('DB_SHOP_PASSWORD', ''),
        'charset' => env('DB_CHARSET', 'utf8mb4'),
        'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
        'prefix' => env('DB_PREFIX', ''),
        'pool' => [
            'min_connections' => 1,
            'max_connections' => 10,
            'connect_timeout' => 10.0,
            'wait_timeout' => 3.0,
            'heartbeat' => -1,
            'max_idle_time' => (float) env('DB_MAX_IDLE_TIME', 60),
        ],
        'cache' => [
            'handler' => Hyperf\ModelCache\Handler\RedisHandler::class,
            'cache_key' => '{mc:%s:m:%s}:%s:%s',
            'prefix' => 'shop',
            'ttl' => 3600 * 24,
            'empty_model_ttl' => 600,
            'load_script' => true,
        ],
        'commands' => [
            'gen:model' => [
                'path' => 'app/Model/Shop',
                'force_casts' => true,
                'inheritance' => 'Model',
                'uses' => '',
                'table_mapping' => [],
            ],
        ],
    ],
];
