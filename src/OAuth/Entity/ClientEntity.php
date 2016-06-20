<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午6:03
 */

namespace Dy\OAuth\Entity;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;

/**
 * Class ClientEntity
 * @package Dy\OAuth\Entity
 *
 * example https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Entities/ClientEntity.php
 */
class ClientEntity implements ClientEntityInterface
{
    use EntityTrait, ClientTrait;
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setRedirectUri($uri)
    {
        $this->redirectUri = $uri;
    }
}
