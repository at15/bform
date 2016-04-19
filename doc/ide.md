# IDE Setup

How to setup the environment in PHPStorm

## Set PHP7

- search for php in settings
- set php language level to 7
- add a new  interpreter, chose remote, vagrant, and it will
ask you to accept unknown host rsa when using ssh.


## Hint

 Since we are using illuminate/database for DB and the WHOLE laravel
 framework for migration, PHPStorm will find multiple definition for
 Database classes, got to `vendor` folder and mark either `illuminate/database`
 or `laravel/framework/src/Illuminate/Database` as `excluded`
