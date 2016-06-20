<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午6:35
 */

namespace Dy\OAuth\Repository;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\UserEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;
use Dy\OAuth\Entity\UserEntity;

/**
 * Class UserRepository
 * @package Dy\OAuth\Repository
 *
 * example https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Repositories/UserRepository.php
 */
class UserRepository implements UserRepositoryInterface
{
    public function getUserEntityByUserCredentials(
        $username,
        $password,
        $grantType,
        ClientEntityInterface $clientEntity
    ): UserEntityInterface
    {
        // TODO: real password check from database
        if ($username === 'mie' && $password === '123') {
            // TODO: assign data from database query result
            return new UserEntity();
        }
        return null;
    }
}
