# OAuth

OAuth2 server implementation based on https://github.com/thephpleague/oauth2-server

some documentation could be found in [the Session library](../Session/README.md)

## Authorization Server

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

- [ ] the implementation is not proper for first party
- [ ] grantType is never used


### UserRepository

- [ ] UserEntity seems to be too simple to do anything, how can I get user identifier without any parameters?
      I should add other methods to do that, the interface only requires what is needed by the framework itself
- [ ] UserRepository example is too simple ....

### RefreshTokenRepository

The interface is pretty similar to AccessTokenRepository.
Though AccessToken should be stored in cache like redis
(the framework use JWT, but you can't revoke a JWT token unless you have server storage)

### ScopeRepository

This should integrate with permission system

## Resource Server


## Test

using POSTMAN, current authorization server is working.
The framework use JWT entirely, without using database.

````
POST /index.php/access_token HTTP/1.1
Host: bform.lk
Cache-Control: no-cache
Postman-Token: 0b9a6d08-957f-f1c4-b64e-5957300b2eac
Content-Type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW

----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="grant_type"

password
----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="client_id"

browser
----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="client_secret"

browser
----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="username"

mie
----WebKitFormBoundary7MA4YWxkTrZu0gW
Content-Disposition: form-data; name="password"

123
----WebKitFormBoundary7MA4YWxkTrZu0gW
````


