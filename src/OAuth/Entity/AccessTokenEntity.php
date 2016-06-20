<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午5:05
 */

namespace Dy\OAuth\Entity;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

/**
 * Class AccessTokenEntity
 * @package Dy\OAuth\Entity
 *
 * example: https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Entities/AccessTokenEntity.php
 */
class AccessTokenEntity implements AccessTokenEntityInterface
{
    // TODO: what does these traits do
    use AccessTokenTrait, TokenEntityTrait, EntityTrait;
}
