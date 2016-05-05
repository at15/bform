<?php

/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/5
 * Time: 20:37
 */
declare(strict_types = 1);

namespace Dy\Cache;

interface CacheProvider
{
    // TODO: support multiple namespace.
    function setNamespace(string $name);

    function get(string $name);

    function set(string $name, $value);

    function hashKey(string $name): string;
}
