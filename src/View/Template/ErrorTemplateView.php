<?php
namespace Monkey\Framework\View\Template;

use Monkey\Framework\Interfaces\IView;
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

        $this->getView()->assign('errorId', $error->getId());
        $this->getView()->display('System/Error.tpl');
    }
}
