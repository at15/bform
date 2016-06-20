<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 上午1:27
 */
declare(strict_types = 1);

namespace Dy\OAuth\Repository;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;
use Dy\OAuth\Entity\AccessTokenEntity;

/**
 * Class AccessTokenRepository
 * @package Dy\OAuth\Repository
 *
 * example: https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Repositories/AccessTokenRepository.php
 */
class AccessTokenRepository implements AccessTokenRepositoryInterface
{
    // TODO: https://github.com/thephpleague/oauth2-server/pull/553
    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    : AccessTokenEntityInterface
    {
        $accessToken = new AccessTokenEntity();
        $accessToken->setClient($clientEntity);
        foreach ($scopes as $scope) {
            $accessToken->addScope($scope);
        }
        $accessToken->setUserIdentifier($userIdentifier);
        return $accessToken;
    }

    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
    {
        // TODO: Implement persistNewAccessToken() method.
        // Some logic here to save the access token to a database
        // TODO: when using JWT without manually revoke, persist is not required.
    }

    public function revokeAccessToken($tokenId): void
    {
        // TODO: Implement revokeAccessToken() method.
        /*
         * This method is called when a refresh token is used to reissue an access token.
         * The original access token is revoked a new access token is issued.
         */
    }

    public function isAccessTokenRevoked($tokenId): bool
    {
        // TODO: Implement isAccessTokenRevoked() method.
        /*
         * This method is called when an access token is validated by the resource server middleware.
         * Return true if the access token has been manually revoked before it expired.
         * If the token is still valid return false.
         */
    }
}
