<?php

defined('APP_PATH') || define('APP_PATH', realpath('.'));

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'farm',
        'charset'     => 'utf8',
    ),
    'redis' => array(
        'host'        => '',
        'port'        => '',
        'auth'        => '',
        'lefetime'    => '',
        'prefix'      => '',
        'statsKey'    => ''
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'userDir'        => APP_PATH . '/user/',
        'baseUri'        => '/mytest/',
    ),
    'timeout' => array(
        'logout_life_time'  => '180',
        'login_life_time'   => '3600'
    )
));
