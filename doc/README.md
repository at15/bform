# Documentation for bform

## Stack

### Front

You can find tutorial [here](https://angular.io/docs/ts/latest/tutorial)

- Typescript
- Angular2

### Backend

- Nginx (Openresty) is used to serve static file, proxy request to tomcat. Also we could use lua to route base on JWT
- Java + Spring boot (use as rest server only, may optimize the pom, since we are using full mvc)
- H2 (May use MySQL for production, since we are using hibernate, the change could be transparent). Also h2 has a console.
- Elasticsearch (for search and NoSQL storage)
- Auth part, could use middleware, spring security or shiro.

## Setup

### Windows

- [Install Nginx](https://moonbingbing.gitbooks.io/openresty-best-practices/content/openresty/install_on_windows.html)
- Install Java
- Install Maven
- Install Node

### Linux

### Vagrant