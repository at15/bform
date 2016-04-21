<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-4-21
 * Time: 下午11:48
 *
 * Helper functions for web
 */

function is_request_method($method)
{
    return in_array($method, ['get', 'post', 'put', 'delete'], true);
}
