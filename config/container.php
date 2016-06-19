<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/4
 * Time: 22:44
 */
use \Dy\Log\LoggerFactory;

// create container
$container = new \Slim\Container();

// log
// TODO: realpath will check if the folder exists, which is a waste of IO operations
$logFolder = realpath(__DIR__ . '/../storage/logs');
// TODO: LoggerFactory should be configured and stored in container instead of using as a singleton
LoggerFactory::setLogFolder($logFolder);
$container['logger'] = function ($c) {
    return LoggerFactory::getLogger('app');
};

// return container
return $container;
