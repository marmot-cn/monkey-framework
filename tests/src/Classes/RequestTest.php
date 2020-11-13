<?php
namespace Marmot\Framework\Classes;

use Marmot\Core;
use Marmot\Framework\Classes\Request;

use PHPUnit\Framework\TestCase;

/**
 * 用于测试Request类接收不同方式的传参正确性
 * 1. 判断HTTP METHOD正确性
 * 2. 接收传参正确性
 * @SuppressWarnings(PHPMD.Superglobals)
 */
class RequestTest extends TestCase
{
    private $request;

    public function setUp()
    {
        $this->request = new Request();
    }

    public function tearDown()
    {
        unset($_SERVER['HTTP_X_REQUESTED_WITH']);
        unset($this->request);
    }

    public function testExtendsBaseRequest()
    {
        $this->assertInstanceOf(
            'Marmot\Basecode\Classes\Request',
            $this->request
        );
    }

    //测试isAjax
    //1. 测试 HTTP_X_REQUESTED_WITH = XMLHttpRequest
    //2. 期望返回 true
    public function testIsAjaxReturnTrue()
    {
        $_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
        $result = $this->request->isAjax();

        $this->assertTrue($result);
    }

    //测试jsAjax
    //1. 测试 未定义 HTTP_X_REQUESTED_WITH
    //2. 期望返回 false
    public function testIsAjaxReturnFalse()
    {
        $result = $this->request->isAjax();

        $this->assertFalse($result);
    }
}
