# OAuth

OAuth2 server implementation based on https://github.com/thephpleague/oauth2-server

some documentation could be found in [the Session library](../Session/README.md)

## Questions

### persistNewAccessToken

In the example, it says save to database, but in the doc

https://github.com/thephpleague/oauth2-server/blob/master/examples/src/Repositories/AccessTokenRepository.php

````php
/**
* {@inheritdoc}
*/
public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
{
   // Some logic here to save the access token to a database
}
````

> When a new access token is created this method will be called.
> You don’t have to do anything here but for auditing you probably want to
