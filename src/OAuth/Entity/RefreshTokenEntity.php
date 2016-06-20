<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午6:55
 */

namespace Dy\OAuth\Entity;

use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\RefreshTokenTrait;

class RefreshTokenEntity implements RefreshTokenEntityInterface
{
    // TODO: these two traits are just simple getter and setter
    use EntityTrait, RefreshTokenTrait;
}
