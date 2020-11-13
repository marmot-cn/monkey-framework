<?php
namespace Marmot\Framework\View\Template;

use Marmot\Interfaces\IView;
use Marmot\Core;

/**
 * 错误模板输出视图
 *
 * @author chloroplast
 */
class ErrorTemplateView extends TemplateView implements IView
{
    public function display()
    {
        $error = Core::getLastError();

        $view = $this->getView();
        
        $view->assign('errorId', $error->getId());
        $view->display('System/Error.tpl');
    }
}
