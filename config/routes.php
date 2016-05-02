<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/2
 * Time: 23:05
 */

// You need to have app defined in this scope
if (!isset($app)) {
    throw new RuntimeException('$app must be set before define route');
}

$app->post('/tokens', 'Bform\\Controller\\Token::create');
$app->delete('/tokens/{token}', 'Bform\\Controller\\Token::revoke');
