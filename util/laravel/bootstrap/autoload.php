<?php

require __DIR__.'/../../../vendor/autoload.php';

// since we didn't add classmap in composer as normal laravel applications, we need to include
// every class we need.
require __DIR__ . '/../app/Providers/AppServiceProvider.php';

// NOTE: TODO: migration and database classes does not need to be included
