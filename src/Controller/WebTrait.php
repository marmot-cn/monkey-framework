<?php
namespace Monkey\Framework\Controller;

use Monkey\Framework\Classes\Response;

use Monkey\Framework\View\Json\ErrorJsonView;
use Monkey\Framework\View\Json\SuccessJsonView;

use Monkey\Framework\View\Template\ErrorTemplateView;
use Monkey\Framework\View\Template\SuccessTemplateView;

/**
 * jsonapi性状, 具体应用层继承 Controller, 如果是前端服务层提供页面服务则实现 Web性状.
 */
trait WebTrait
{
    public function displaySuccess()
    {
        $this->getRequest()->isAjax() ?  $this->render(new SuccessJsonView()):
        $this->render(new SuccessTemplateView());
    }

    public function displayError()
    {
        $this->getRequest()->isAjax() ?  $this->render(new ErrorJsonView()):
        $this->render(new ErrorTemplateView());
    }

    public function error()
    {
        header('HTTP/1.1 500 Internal Server Error');
    }

    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
    }

    protected function initHook()
    {
        $this->getResponse()->format = Response::DEFAULT;
    }
}