<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午6:40
 */

namespace Dy\OAuth\Entity;

use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Class UserEntity
 * @package Dy\OAuth\Entity
 *
 * example https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Entities/UserEntity.php
 */
class UserEntity implements UserEntityInterface
{
    public function getIdentifier()
    {
        // FIXME: this should return something else, but no parameter is given
        return 1;
    }
}
