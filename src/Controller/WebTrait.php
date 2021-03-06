<?php
namespace Marmot\Framework\Controller;

use Marmot\Framework\Classes\Response;

use Marmot\Framework\View\Json\ErrorJsonView;
use Marmot\Framework\View\Json\SuccessJsonView;

use Marmot\Framework\View\Template\ErrorTemplateView;
use Marmot\Framework\View\Template\SuccessTemplateView;

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

    /**
     * @codeCoverageIgnore
     */
    public function error()
    {
        header('HTTP/1.1 500 Internal Server Error');
    }

    /**
     * @codeCoverageIgnore
     */
    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
    }

    protected function initHook()
    {
        $this->getResponse()->format = Response::FORMAT_DEFAULT;
    }
}
