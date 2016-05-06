<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 2016/5/5
 * Time: 21:18
 */

namespace Dy\Cache;


final class NamedCache
{
    /**
     * @var CacheProvider
     */
    protected $provider;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var int
     */
    protected $ttl;

    public function __construct(CacheProvider $provider, Name $name)
    {
        $this->provider = $provider;
        $this->name = $name;
        $this->ttl = $name->getTtl();
    }

    public function set(string $name, $value)
    {
        $this->provider->set($this->getRealKey($name), $value, $this->ttl);
    }

    public function get(string $name)
    {
        return $this->provider->get($this->getRealKey($name));
    }

    /**
     * Clear all the keys in this namespace
     */
    public function flush()
    {
        $this->provider->flushByPrefix($this->getNamePrefix());
    }

    public function getRealKey(string $name):string
    {
        // namespace is a key prefix
        $namespace = $this->getNamePrefix();
        // shorten the hash
        $name = substr(sha1($name), 5);
        return $namespace . $name;
    }

    protected function getNamePrefix():string
    {
        return substr(sha1($this->name->getValue()), 3);
    }
}
