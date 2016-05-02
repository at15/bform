<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-4-21
 * Time: 下午11:48
 *
 * Helper functions for web
 */

/**
 * @param $method string
 * @return bool
 */
function is_request_method($method)
{
    return in_array($method, ['get', 'post', 'put', 'delete'], true);
}

/**
 * @param array ...$segments
 * @return string
 */
function concat_url(...$segments)
{
    $len = count($segments);
    $url = rtrim($segments[0], '/');
    for ($i = 1; $i < $len; $i++) {
        $url .= '/' . trim($segments[$i], '/');
    }
    return $url;
}
