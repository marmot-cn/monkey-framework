<?php
namespace Marmot\Framework\View\Template;

use Prophecy\Argument;

use PHPUnit\Framework\TestCase;

use Marmot\Framework\View\Smarty;
use Marmot\Core;

class ErrorTemplateViewTest extends TestCase
{
    private $errorTemplateView;

    public function setUp()
    {
        $this->errorTemplateView = $this->getMockBuilder(ErrorTemplateView::class)
            ->setMethods([
                'getView'
            ])
            ->getMock();
    }

    public function tearDown()
    {
        unset($this->errorTemplateView);
    }

    public function testDisplay()
    {
        //初始化
        $view = $this->prophesize(Smarty::class);

        //预测
        $view->assign(
            Argument::exact('errorId'),
            Core::getLastError()->getId()
        )->shouldBeCalledTimes(1);

        $view->display(
            Argument::exact('System/Error.tpl')
        )->shouldBeCalledTimes(1);

        //绑定
        $this->errorTemplateView->expects($this->exactly(1))
            ->method('getView')
            ->willReturn($view->reveal());

        //揭示
        $this->errorTemplateView->display();
    }
}
