<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/4
 * Time: 22:44
 */
use Dy\Log\LoggerFactory;
use League\OAuth2\Server\AuthorizationServer;
use Dy\OAuth\Repository\AccessTokenRepository;
use Dy\OAuth\Repository\RefreshTokenRepository;
use Dy\OAuth\Repository\UserRepository;
use Dy\OAuth\Repository\ScopeRepository;
use Dy\OAuth\Repository\ClientRepository;


// create container
$container = new \Slim\Container();

/* Start of Log */
// TODO: realpath will check if the folder exists, which is a waste of IO operations
$logFolder = realpath(__DIR__ . '/../storage/logs');
// TODO: LoggerFactory should be configured and stored in container instead of using as a singleton
LoggerFactory::setLogFolder($logFolder);
$container['logger'] = function ($c) {
    return LoggerFactory::getLogger('app');
};
/* End of Log */


/* Start of OAuth2 server */
// example https://github.com/thephpleague/oauth2-server/blob/master/examples/public/password.php
// TODO: actually, these class should only be initialized when the OAuth2 part is needed
// the container may have a lazy loading feature.
$container[AuthorizationServer::class] = function ($c) {
    $keyPath = realpath(__DIR__ . '/../storage/app');
    $privateKey = "file://{$keyPath}/private.key";
    $publicKey = "file://{$keyPath}/public.key";
    // Setup the authorization server
    $server = new AuthorizationServer(
        new ClientRepository(),
        new AccessTokenRepository(),
        new ScopeRepository(),
        $privateKey,
        $publicKey
    );
    $passwordGrant = new \League\OAuth2\Server\Grant\PasswordGrant(
        new UserRepository(),
        new RefreshTokenRepository()
    );
    $passwordGrant->setRefreshTokenTTL(new \DateInterval('P1M')); // refresh tokens will expire after 1 month
    // Enable the password grant on the server
    $server->enableGrantType(
        $passwordGrant,
        new \DateInterval('PT1H') // access tokens will expire after 1 hour
    );
    return $server;
};
/* End of OAuth2 server */

return $container;
