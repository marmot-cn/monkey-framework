<?php
namespace Marmot\Framework\View\Json;

use PHPUnit\Framework\TestCase;

class JsonViewTest extends TestCase
{
    private $jsonView;

    public function setUp()
    {
        $this->jsonView = new MockJsonView();
    }

    public function tearDown()
    {
        unset($this->jsonView);
    }

    /**
     * 测试 construct
     */
    public function testConstruct()
    {
        $this->assertEquals(
            JsonView::STATUS_SUCCESS,
            $this->jsonView->getResult()['status']
        );

        $this->assertEquals(
            array(
                'status' => JsonView::STATUS_SUCCESS,
                'data' => array()
            ),
            $this->jsonView->getResult()
        );

        $this->assertEquals(array(), $this->jsonView->getData());
    }

    /**
     * 测试 success
     * 1. 调用 success()
     * 2. 期望 status = STATUS_SUCCESS
     * 3. 返回 instanceof JsonView
     */
    public function testSuccess()
    {
        $result = $this->jsonView->success();
        $this->assertEquals(
            JsonView::STATUS_SUCCESS,
            $this->jsonView->getResult()['status']
        );
        $this->assertInstanceOf('Marmot\Framework\View\Json\JsonView', $result);
    }

    /**
     * 测试 failure
     * 1. 调用 failure()
     * 2. 期望 status = STATUS_FAILURE
     * 3. 返回 instanceof JsonView
     */
    public function testFailure()
    {
        $result = $this->jsonView->failure();
        $this->assertEquals(JsonView::STATUS_FAILURE, $this->jsonView->getResult()['status']);
        $this->assertInstanceOf('Marmot\Framework\View\Json\JsonView', $result);
    }

    /**
     * 测试 encode
     * 1. 传参 $data
     * 2. 期望返回 json_encode, result 数组
     */
    public function testEncode()
    {
        $data = ['data'];
        $expectedResult = json_encode(
            ['status' => JsonView::STATUS_SUCCESS, 'data' => $data]
        );

        $this->expectOutputString($expectedResult);
        $this->jsonView->encode($data);
    }
}
