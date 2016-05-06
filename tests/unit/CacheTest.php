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
}
