<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/5
 * Time: 20:40
 */

namespace Dy\Cache;

use \Predis\Client;

final class RedisProvider implements CacheProvider
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        // TODO: get config for client
        $this->client = new Client();
    }

    public function get(string $name)
    {
        return $this->client->get($name);
    }

    public function set(string $name, $value, int $ttl = 100)
    {
        // https://github.com/nrk/predis/issues/203
        // http://redis.io/commands/SET
        // TODO: support other usage like nx, xx
        // EX seconds -- Set the specified expire time, in seconds.
        // PX milliseconds -- Set the specified expire time, in milliseconds.
        // NX -- Only set the key if it does not already exist.
        // XX -- Only set the key if it already exist.
        $this->client->set($name, $value, 'ex', $ttl);
    }

    public function flushByPrefix(string $prefix) : int
    {
        // TODO: does redis support regexp in matching?
        $pattern = $prefix . '*';
        $cursor = 0;
        $counter = 0;
        do {
            $result = $this->client->scan($cursor, $pattern);
            $cursor = $result[0];
            if (!empty($result[1])) {
                $this->client->del($result[1]);
            }
            $counter++;
        } while ($cursor != 0);
        return $counter;
    }
}
