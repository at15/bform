<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/4
 * Time: 22:44
 */

// return container
$container = new \Slim\Container();
// TODO: realpath will check if the folder exists, which is a waste of IO operations
$logFolder = realpath(__DIR__ . '/../storage/logs');
$container['logger'] = function ($c) use ($logFolder) {
    $logger = new \Monolog\Logger('app');
    $fileHandler = new \Monolog\Handler\StreamHandler($logFolder . '/app.log');
    $logger->pushHandler($fileHandler);
    return $logger;
};
return $container;
