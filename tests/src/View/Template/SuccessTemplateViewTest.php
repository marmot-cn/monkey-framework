<?php
namespace Marmot\Framework\View\Template;

use Prophecy\Argument;

use PHPUnit\Framework\TestCase;

use Marmot\Framework\View\Smarty;
use Marmot\Core;

class SuccessTemplateViewTest extends TestCase
{
    private $successTemplateView;

    public function setUp()
    {
        $this->successTemplateView = $this->getMockBuilder(SuccessTemplateView::class)
            ->setMethods([
                'getView'
            ])
            ->getMock();
    }

    public function tearDown()
    {
        unset($this->successTemplateView);
    }

    public function testDisplay()
    {
        //初始化
        $view = $this->prophesize(Smarty::class);

        //预测
        $view->display(
            Argument::exact('System/Success.tpl')
        )->shouldBeCalledTimes(1);

        //绑定
        $this->successTemplateView->expects($this->exactly(1))
            ->method('getView')
            ->willReturn($view->reveal());

        //揭示
        $this->successTemplateView->display();
    }
}
