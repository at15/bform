<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:15
 */
declare(strict_types = 1);

namespace Bform\Controller;

use Interop\Container\ContainerInterface;
use Slim\Http\{
    Request, Response
};

final class Token
{
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
        //to access items in the container... $this->ci->get('');
    }

    public function create(Request $request, Response $response)
    {
        return $response->withJson(['foo' => 'bar']);
    }

    public function revoke(Request $request, Response $response)
    {
        return $response->withJson(['foo' => 'bar']);
    }
}
