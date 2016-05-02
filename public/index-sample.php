<?php
/**
 * Web application bootstrap file
 *
 * @author at15
 */
declare(strict_types=1);

require(__DIR__ . '/../vendor/autoload.php');

use \Slim\Http\{
    Request, Response
};

// let's create a slim application
$c = new \Slim\Container();
$app = new \Slim\App($c);
// disable slim error handling
unset($app->getContainer()['errorHandler']);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write(' Hello this is bform ');
    return $response;
});

// test argument
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, {$name}");

    return $response;
});

// test regex argument
$app->get('/users/{id:[0-9]+}', function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
    $response->getBody()->write("Hello, user with id {$id}");

    return $response;
});

// this will result in 500, since slim error handling is disabled
$app->get('/ex', function (Request $request, Response $response) {
    throw new Exception('I am a exception');
});

$app->run();
