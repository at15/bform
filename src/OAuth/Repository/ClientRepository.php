<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 下午5:57
 */

namespace Dy\OAuth\Repository;

use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use Dy\OAuth\Entity\ClientEntity;

class ClientRepository implements ClientRepositoryInterface
{
    public function getClientEntity($clientIdentifier, $grantType, $clientSecret = null, $mustValidateSecret = true)
    : ClientEntityInterface
    {
        //  TODO: I think we can avoid the client check if the grantType is password
        // But how can we make sure this is a first party application
        $builtInClients = [
            'browser' => [
                'secret' => password_hash('browser', PASSWORD_BCRYPT),
                'name' => 'browser client',
                // TODO: first party client does not need redirect url?
                'redirect_uri' => 'http://foo/bar',
                // TODO: what does is_confidential mean? the example usage is quite confusing
                //  is capable of securely storing a secret
                // TODO： is browser capable of securely storing a secret?
                'is_confidential' => true,
            ]
        ];

        $clientRegisterInfo = null;

        // Check if client is first party clients
        if (isset($builtInClients[$clientIdentifier])) {
            $clientRegisterInfo = $builtInClients[$clientIdentifier];
        }

        // TODO: query third party clients from database to check if it exists
        if (is_null($clientRegisterInfo)) {
            return null;
        }

        if ($mustValidateSecret && $clientRegisterInfo['is_confidential']) {
            if (!password_verify($clientSecret, $clientRegisterInfo['secret'])) {
                return null;
            }
        }

        $client = new ClientEntity();
        $client->setIdentifier($clientIdentifier);
        $client->setName($clientRegisterInfo['name']);
        $client->setRedirectUri($clientRegisterInfo['redirect_uri']);

        return $client;
    }
}
