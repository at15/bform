<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午7:14
 */

namespace Dy\OAuth\Repository;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;
use Dy\OAuth\Entity\ScopeEntity;

class ScopeRepository implements ScopeRepositoryInterface
{
    public function getScopeEntityByIdentifier($identifier) : ScopeEntityInterface
    {
        // TODO: change to real scope
        $scopes = [
            'basic' => [
                'description' => 'Basic details about you',
            ],
            'email' => [
                'description' => 'Your email address',
            ],
        ];
        if (array_key_exists($identifier, $scopes) === false) {
            return null;
        }
        $scope = new ScopeEntity();
        $scope->setIdentifier($identifier);
        return $scope;
    }

    public function finalizeScopes(
        array $scopes,
        $grantType,
        ClientEntityInterface $clientEntity,
        $userIdentifier = null
    )
        // FIXME: : ScopeEntityInterface[] is not allowed as return type
    {
//    This method is called right before an access token or authorization code is created.
//    Given a client, grant type and optional user identifier validate the set of scopes requested are valid and optionally append additional scopes or remove requested scopes.
//    This method is useful for integrating with your own app’s permissions system.
        // Example of programatically modifying the final scope of the access token
//        if ((int) $userIdentifier === 1) {
//            $scope = new ScopeEntity();
//            $scope->setIdentifier('email');
//            $scopes[] = $scope;
//        }

        return $scopes;
    }
}
