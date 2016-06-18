# Architecture

It use MC structure, view is replaced with JSON output.
And most logic will be handled by repositories.

- `app` and `config` store all business logic
- `src` are libraries that may be split to single packages later

````
app 
    - Controller
    - Middleware
config
    - container.php
    - routes.php
````

TODO:

- repository
