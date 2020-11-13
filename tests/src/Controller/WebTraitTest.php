<?php
namespace Marmot\Framework\Controller;

use PHPUnit\Framework\TestCase;

use Marmot\Framework\Classes\Request;
use Marmot\Framework\Classes\Response;

use Marmot\Framework\View\Json\ErrorJsonView;
use Marmot\Framework\View\Json\SuccessJsonView;

use Marmot\Framework\View\Template\ErrorTemplateView;
use Marmot\Framework\View\Template\SuccessTemplateView;

class WebTraitTest extends TestCase
{
    private $webTrait;

    public function tearDown()
    {
        unset($this->webTrait);
    }

    public function testDisplaySuccessAjax()
    {
        $this->webTrait = $this->getMockBuilder(MockWebTrait::class)
                               ->setMethods(['getRequest', 'render'])
                               ->getMock();

        $request = $this->prophesize(Request::class);
        $request->isAjax()->shouldBeCalledTimes(1)->willReturn(true);

        $this->webTrait->expects($this->exactly(1))
                       ->method('getRequest')
                       ->willReturn($request->reveal());

        $this->webTrait->expects($this->exactly(1))
                       ->method('render')
                       ->with(new SuccessJsonView());

        $this->webTrait->displaySuccess();
    }

    public function testDisplaySuccess()
    {
        $this->webTrait = $this->getMockBuilder(MockWebTrait::class)
                               ->setMethods(['getRequest', 'render'])
                               ->getMock();

        $request = $this->prophesize(Request::class);
        $request->isAjax()->shouldBeCalledTimes(1)->willReturn(false);

        $this->webTrait->expects($this->exactly(1))
                       ->method('getRequest')
                       ->willReturn($request->reveal());

        $this->webTrait->expects($this->exactly(1))
                       ->method('render')
                       ->with(new SuccessTemplateView());

        $this->webTrait->displaySuccess();
    }

    public function testDisplayErrorAjax()
    {
        $this->webTrait = $this->getMockBuilder(MockWebTrait::class)
                               ->setMethods(['getRequest', 'render'])
                               ->getMock();

        $request = $this->prophesize(Request::class);
        $request->isAjax()->shouldBeCalledTimes(1)->willReturn(true);

        $this->webTrait->expects($this->exactly(1))
                       ->method('getRequest')
                       ->willReturn($request->reveal());

        $this->webTrait->expects($this->exactly(1))
                       ->method('render')
                       ->with(new ErrorJsonView());

        $this->webTrait->displayError();
    }

    public function testDisplayError()
    {
        $this->webTrait = $this->getMockBuilder(MockWebTrait::class)
                               ->setMethods(['getRequest', 'render'])
                               ->getMock();

        $request = $this->prophesize(Request::class);
        $request->isAjax()->shouldBeCalledTimes(1)->willReturn(false);

        $this->webTrait->expects($this->exactly(1))
                       ->method('getRequest')
                       ->willReturn($request->reveal());

        $this->webTrait->expects($this->exactly(1))
                       ->method('render')
                       ->with(new ErrorTemplateView());

        $this->webTrait->displayError();
    }

    public function testInitHook()
    {
        $this->webTrait = new MockWebTrait();

        $this->webTrait->mockInitHook();

        $this->assertEquals(
            Response::FORMAT_DEFAULT,
            $this->webTrait->getResponse()->format
        );
    }
}
