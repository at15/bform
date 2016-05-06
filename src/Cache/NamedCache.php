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
        // TODO: will shorten cause name collision?
        $name = substr(sha1($name), 0, 5);
        return $namespace . $name;
    }

    // TODO: there could be collision like app->user and app:user
    protected function getNamePrefix():string
    {
        // support nested names, like App:Session:VIP
        // : is added to avoid namespace and key name collision
        $prefix = ':' . $this->hash($this->name->getValue());
        $cur = $this->name;
        // max level is 10
        for ($i = 0; $i < 10; $i++) {
            if (!$cur->hasParent()) {
                break;
            }
            $cur = $cur->getParent();
            $prefix = ':' . $this->hash($cur->getValue()) . $prefix;
        }
        return $prefix;
    }

    protected function hash(string $str):string
    {
        return substr(sha1($str), 0, 3);
    }
}
