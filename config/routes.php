<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:05
 */
use Slim\Http\{
    Request, Response
};

// You need to have app defined in this scope
if (!isset($app)) {
    throw new RuntimeException('$app must be set before define route');
}

// return CORS for all options request since swagger will issue a OPTION request
// before any actual request
$app->add(function (Request $request, Response $response, $next) {
    /** @var \Monolog\Logger $logger */
    $logger = $this->logger;
    if ($request->isOptions()) {
        $logger->addInfo('OPTIONS Request');
        return \Bform\Middleware\Cors::addHeader($response);
    }
    return $next($request, $response);
});

$app->group('/api/v1', function () use ($app) {
    $app->post('/tokens', 'Bform\\Controller\\Token::create');
    $app->delete('/tokens/{token}', 'Bform\\Controller\\Token::revoke');
})->add(new \Bform\Middleware\Cors());

// http://bform.lk/index.php/test/1/2
$app->get('/test/{k}/{v}', function (Request $request, Response $response) {
    /** @var \Monolog\Logger $logger */
    $logger = $this->logger;
    $logger->addInfo('test kv request');
    $k = $request->getAttribute('k');
    $v = $request->getAttribute('v');
    $cache = new Dy\Cache\RedisProvider();
    $oldV = $cache->get($k);
    $cache->set($k, $v);
    $response->getBody()->write("k {$k} v {$v} oldV {$oldV}");
    return $response;
});
