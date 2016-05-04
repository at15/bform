<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:05
 */

// You need to have app defined in this scope
if (!isset($app)) {
    throw new RuntimeException('$app must be set before define route');
}

// nop is used for swagger options request
function nop($request, $response)
{
    return $response;
}

$app->group('/api/v1', function () use ($app) {
    $app->post('/tokens', 'Bform\\Controller\\Token::create');
    $app->options('/tokens', nop);
    $app->delete('/tokens/{token}', 'Bform\\Controller\\Token::revoke');
    $app->options('/tokens/{token}', nop);
})->add(new \Bform\Middleware\Cors());

$app->get('/test', function ($request, $response) {
    $response->getBody()->write('I am test');
    return $response;
//})->add(function ($req, $res, $next) {
//    $res->getBody()->write('hahaha');
//    $res = $res->withHeader('x-mie', 'is a mie')
//        ->withHeader('Access-Control-Allow-Origin', '*');
//    $res = $next($req, $res); // if comment this out, I am test won't show ...
//    return $res;
//});
})->add(new \Bform\Middleware\Cors());
