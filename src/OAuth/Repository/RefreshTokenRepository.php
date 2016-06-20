<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午6:59
 */

namespace Dy\OAuth\Repository;

use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;
use Dy\OAuth\Entity\RefreshTokenEntity;

class RefreshTokenRepository implements RefreshTokenRepositoryInterface
{
    public function getNewRefreshToken()
    {
        // TODO: why getNewRefreshToken does not have parameters like getNewAccessToken
        return new RefreshTokenEntity();
    }

    public function persistNewRefreshToken(RefreshTokenEntityInterface $refreshTokenEntity)
    {
        // TODO: store the refresh token in database
    }

    public function revokeRefreshToken($tokenId)
    {
        // TODO: remove the token stored in database
    }

    public function isRefreshTokenRevoked($tokenId) : bool
    {
        // TODO: check the database
        return false;
    }
}
