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

// return cors for all options request
$app->add(function ($request, $response, $next) {
    if ($request->isOptions()) {
        return \Bform\Middleware\Cors::addHeader($response);
    }
    return $next($request, $response);
});

$app->group('/api/v1', function () use ($app) {
    $app->post('/tokens', 'Bform\\Controller\\Token::create');
    $app->delete('/tokens/{token}', 'Bform\\Controller\\Token::revoke');
})->add(new \Bform\Middleware\Cors());

$app->get('/test', function ($request, $response) {
    $response->getBody()->write('I am test');
    return $response;
});
