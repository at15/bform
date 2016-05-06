<?php


class CacheTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testNamed()
    {
        $name = new \Dy\Cache\Name();
        $v = 'session';
        $name->setValue($v);
        $this->assertEquals($v, $name->getValue());
    }

    public function testRedisProvider()
    {
        $r = new \Dy\Cache\RedisProvider();
        $k = 'foo';
        $v = 'bar';
        $r->set($k, $v);
        $this->assertEquals($v, $r->get($k));
    }

    public function testNamedCache()
    {
        $c = new \Dy\Cache\NamedCache(new \Dy\Cache\RedisProvider(),
            new \Dy\Cache\Name('session'));
        $c->set('foofoo', 'bar');
        $this->assertEquals('bar', $c->get('foofoo'));
    }

    public function testNamedCacheTTL()
    {
        $name = new \Dy\Cache\Name('session');
        $name->setTtl(1);
        $c = new \Dy\Cache\NamedCache(new \Dy\Cache\RedisProvider(), $name);
        $c->set('foo2', 'barbar');
        $this->assertEquals('barbar', $c->get('foo2'));
        sleep(2);
        $this->assertNotEquals('barbar', $c->get('foo2'));
    }

    public function testNamedCacheFlush()
    {
        $name = new \Dy\Cache\Name('session');
        $name->setTtl(1000);
        $r = new \Dy\Cache\RedisProvider();
        $c = new \Dy\Cache\NamedCache($r, $name);
        $c->set('foo', 'barbar');
        $c->set('bar', 'barbar');
        $r->set('foo', 'barbar');
        $c->flush();
        $this->assertEmpty($c->get('foo'));
        $this->assertEmpty($c->get('bar'));
        // just flush named, not all keys
        $this->assertEquals('barbar', $r->get('foo'));
    }

    public function testNestedNamedCache()
    {
        $appName = new \Dy\Cache\Name('bform');
        $sessionName = new \Dy\Cache\Name('session', $appName);
        $r = new \Dy\Cache\RedisProvider();
        $applicationCache = new \Dy\Cache\NamedCache($r, $appName);
        $sessionCache = new \Dy\Cache\NamedCache($r, $sessionName);
        $applicationCache->set('foo', 'barA');
        $sessionCache->set('foo', 'barS');
        $this->assertEquals('barA', $applicationCache->get('foo'));
        $this->assertEquals('barS', $sessionCache->get('foo'));
        // flush session has not effect on application
        $sessionCache->flush();
        $this->assertEquals('barA', $applicationCache->get('foo'));
        // set session cache again before flush application
        $sessionCache->set('foo', 'barS');
        $applicationCache->flush();
        // should have nothing left
        $this->assertNotEquals('barA', $applicationCache->get('foo'));
        $this->assertNotEquals('barS', $sessionCache->get('foo'));
    }

    public function testNameCollision()
    {
        // should not flush parent name space key
        $appName = new \Dy\Cache\Name('bform');
        $sessionName = new \Dy\Cache\Name('session', $appName);
        $r = new \Dy\Cache\RedisProvider();
        $applicationCache = new \Dy\Cache\NamedCache($r, $appName);
        $sessionCache = new \Dy\Cache\NamedCache($r, $sessionName);
        $applicationCache->set('session', 'foo');
        $sessionCache->flush();
        $this->assertEquals('foo', $applicationCache->get('session'));
    }
}
