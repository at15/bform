# OAuth

OAuth2 server implementation based on https://github.com/thephpleague/oauth2-server

some documentation could be found in [the Session library](../Session/README.md)

## Implementation

### AccessTokenRepository

It seems it does not require database setup since it use JWT

#### persistNewAccessToken

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


#### getNewToken

I just copied the example.
Though there seems to be some issue with it https://github.com/thephpleague/oauth2-server/pull/553

### ClientRepository

It seems the repository need to check if the client is already registered in server, but
what about first party application like browser and our own native clients?

And for password grant, I don't think it's necessary to check if the client is registered.


