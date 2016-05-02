<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:11
 *
 * Test slim application without run command
 */
declare(strict_types = 1);

require(__DIR__ . '/../vendor/autoload.php');

// TODO: config the container, ie: bootstrap database
$c = new \Slim\Container();
$app = new \Slim\App($c);

// config the route
require_once(__DIR__ . '/../config/routes.php');

$app->run();
