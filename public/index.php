<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:11
 *
 * Test slim application without run command
 */
require(__DIR__ . '/../vendor/autoload.php');

$c = require_once(__DIR__ . '/../config/container.php');
$app = new \Slim\App($c);
require_once(__DIR__ . '/../config/routes.php');
$app->run();
