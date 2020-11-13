<?php
namespace Marmot\Framework\Classes;

use Marmot\Core;

use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class SessionTest extends TestCase
{
    private $session;

    private $key = 'test';

    public function setUp()
    {
        $this->session = new MockSession($this->key);
    }

    public function tearDown()
    {
        unset($this->session);
    }

    //测试 getKey
    //1. 构造函数传参 $key
    //2. 期望返回 $key, 'test'
    public function testGetKey()
    {
        $this->assertEquals($this->key, $this->session->getKey());
    }

    //测试 formatKey
    //1. 传参 $id
    //2. 期望返回构造过的 key
    public function testFormatKey()
    {
        $id = 1;
        $formatedKey = $this->key.'.'.$id;

        $this->assertEquals($formatedKey, $this->session->formatKey($id));
    }

    //测试 save
    //1. 传参 $id, $data
    //2. 期望返回 true
    //3. 期望 $_SESSION[$formatedKey] = $data
    public function testSave()
    {
        $id = 1;
        $data = 'data';
        $result = $this->session->save($id, $data);
        $this->assertTrue($result);

        $this->assertEquals($_SESSION[$this->session->formatKey($id)], $data);
    }

    //测试 del
    //1. $_SESSION[$formatedKey] = $data
    //2. del $id
    //3. $_SESSION[$formatedKey] 为空
    public function testDel()
    {
        $id = 1;
        $data = 'data';

        $_SESSION[$this->session->formatKey($id)] = $data;
        $this->session->del($id);

        $this->assertFalse(isset($_SESSION[$this->session->formatKey($id)]));
    }

    //测试 get
    //1. $_SESSION[$formatedKey] = $data
    //2. get $id
    //3. 期望 get 返回的结果 = $data
    public function testGet()
    {
        $id = 1;
        $data = 'data';

        $_SESSION[$this->session->formatKey($id)] = $data;
        $result = $this->session->get($id);

        $this->assertEquals($data, $result);
    }

    //测试 getWithDefault
    //1. $_SESSION[$formatedKey] = '';
    //2. get $id, $default
    //3. 期望 get 返回的结果 = $default
    public function testGetWithDefault()
    {
        $id = 1;
        $default = 'data';

        $result = $this->session->get($id, $default);

        $this->assertEquals($default, $result);
    }
}
