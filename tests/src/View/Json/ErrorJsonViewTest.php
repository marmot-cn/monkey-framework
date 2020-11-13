<?php
namespace Marmot\Framework\View\Json;

use PHPUnit\Framework\TestCase;

use Marmot\Core;

class ErrorJsonViewTest extends TestCase
{
    private $errorView;

    public function setUp()
    {
        $this->errorView = new ErrorJsonView();
    }

    public function tearDown()
    {
        unset($this->errorView);
    }

    public function testExtendsJsonView()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\View\Json\JsonView',
            $this->errorView
        );
    }

    public function testImplementsJsonView()
    {
        $this->assertInstanceOf(
            'Marmot\Interfaces\IView',
            $this->errorView
        );
    }

    public function testDisplay()
    {
        $error = Core::getLastError();
        $data = array(
            'id'=>$error->getId(),
            'title'=>$error->getTitle(),
            'code'=>$error->getCode(),
            'detail'=>$error->getDetail(),
            'source'=>$error->getSource()
        );
        $expectedResult = json_encode([
            'status' => JsonView::STATUS_FAILURE,
            'data' => $data
        ]);

        $this->expectOutputString($expectedResult);
        $this->errorView->display();
    }
}
