<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/4
 * Time: 22:58
 */
declare(strict_types = 1);

namespace Bform\Middleware;

use Slim\Http\{
    Request, Response
};

class Cors
{
    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return \Psr\Http\Message\ResponseInterface Response
     * @TODO: what does slim pass for $next, if this is the last middleware?
     */
    public function __invoke(Request $request, Response $response, $next)
    {
        return $response;
    }
}
