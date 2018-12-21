<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->pluginsDir
    )
)->register();

defined('IMG_URL') || define('IMG_URL','/public/img/');
defined('CSS_URL') || define('CSS_URL','/public/css/');
defined('JS_URL') || define('JS_URL','/public/js/');
