<?php
namespace Marmot\Framework\View\Json;

use PHPUnit\Framework\TestCase;

class SuccessJsonViewTest extends TestCase
{
    private $successView;

    public function setUp()
    {
        $this->successView = new SuccessJsonView();
    }

    public function tearDown()
    {
        unset($this->successView);
    }

    public function testDisplay()
    {
        $expectedResult = json_encode([
            'status' => JsonView::STATUS_SUCCESS,
            'data' => []
        ]);

        $this->expectOutputString($expectedResult);
        $this->successView->display();
    }
}
