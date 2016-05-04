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

$app->group('/api/v1', function () {
    $this->post('/tokens', 'Bform\\Controller\\Token::create');
    $this->delete('/tokens/{token}', 'Bform\\Controller\\Token::revoke');
});

$app->get('/test', function ($request, $response) {
    $response->getBody()->write('I am test');
    return $response;
})->add(function ($req, $res, $next) {
    $res->getBody()->write('hahaha');
    $res = $res->withHeader('x-mie', 'is a mie');
    $res = $next($req,$res); // if comment this out, I am test won't show ...
    return $res;
});
