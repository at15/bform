# Stack

## Front

Front end is in [a separated repo](https://github.com/at15/bform-web), in order to simplify travis ci settings

You can find tutorial [here](https://angular.io/docs/ts/latest/tutorial)

- Typescript
- Sass
- Angular2
- Bootstrap4

## Backend

- Nginx (Openresty) is used to serve static file, proxy request to tomcat. Also we could use lua to route base on JWT
- Java + Spring boot (use as rest server only, may optimize the pom, since we are using full mvc)
- H2 (May use MySQL for production, since we are using hibernate, the change could be transparent). Also h2 has a console.
- Elasticsearch (for search and NoSQL storage)
- Auth part, could use middleware, spring security or shiro.

