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
    /**
     * @var string
     */
    protected $namespace;

    public function __construct()
    {
        // TODO: get config for client
        $this->client = new Client();
        $this->namespace = '';
    }

    public function setNamespace(string $name)
    {
        $this->namespace = $name;
    }

    public function get(string $name)
    {
        return $this->client->get($this->hashKey($name));
    }

    public function set(string $name, $value)
    {
        $this->client->set($this->hashKey($name), $value);
    }

    public function hashKey(string $name) : string
    {
        // TODO:
        // - cut the string length to avoid long key name
        // - better support in namespace
        return sha1($this->namespace . $name);
    }
}
