<?php

declare(strict_types=1);
 
return [
        'driver' => 'mysql',
        'username' => getenv('MYSQL_USER') ?: 'admin',
        'password' => getenv('MYSQL_PASSWORD') ?: '111111',
        'host' => getenv('MYSQL_HOST') ?: '127.0.0.1',
        'database' => getenv('MYSQL_DATABASE') ?: 'app_db',
        'charset' => getenv('MYSQL_CHARSET') ?: 'utf8',
        'collation' => getenv('MYSQL_COLLATION') ?: 'utf8_unicode_ci',
        'prefix' => '',
];