<?php
//powered by kevin
namespace Marmot\Framework\Classes;

use PHPUnit\Framework\TestCase;

use Marmot\Core;

/**
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class CookieTest extends TestCase
{
    private $cookie;

    public function setUp()
    {
        $this->cookie = new Cookie();
    }

    public function tearDown()
    {
        unset($this->cookie);
    }

    public function testConstruct()
    {
        $domain = 'domain';
        $path = 'path';

        $this->cookie = new Cookie($domain, $path);

        $this->assertEquals($domain, $this->cookie->domain);
        $this->assertEquals($path, $this->cookie->path);
    }

    /**
     * 测试 get()
     * 1. $_COOKIE[$name] = encode($value)
     * 2. 期望 get() 返回 $value;
     */
    public function testGet()
    {
        $this->cookie->name = 'name';
        $value = 'value';
        $encodeValue =  $this->cookie->authcode($value, 'ENCODE');

        $_COOKIE[$this->cookie->name] = $encodeValue;

        $result = $this->cookie->get();

        $this->assertEquals($value, $result);
    }

    public function testAuthcode()
    {
        $value = 'value';

        $encodedValue = $this->cookie->authcode($value, 'ENCODE');
        $this->assertNotEquals($encodedValue, $value);

        $decodedValue = $this->cookie->authcode($encodedValue, 'DECODE');
        $this->assertEquals($decodedValue, $value);
    }
}
