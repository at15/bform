<?php
/**
 * Web application bootstrap file
 *
 * @author at15
 */

require(__DIR__ . '/../vendor/autoload.php');

// let's create a slim application
$app = new \Slim\App();
$app->get('/', function ($request, $response, $args) {
    /**
     * @var Slim\Http\Request $request
     * @var Slim\Http\Response $response
     */
    $response->getBody()->write(' Hello this is bform ');
    return $response;
});

$app->run();
