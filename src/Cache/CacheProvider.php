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
    function get(string $name);

    function set(string $name, $value, int $ttl);

    function flushByPrefix(string $prefix) : int;

    // TODO: provider may need to keep track of all the named cache
    // like, session, act, user, etc. in order to have better performance monitor
}
