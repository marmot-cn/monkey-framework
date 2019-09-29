<?php
namespace Marmot\Framework\View\Template;

use Marmot\Framework\Interfaces\IView;
use Marmot\Core;

/**
 * 成功模板输出视图
 *
 * @author chloroplast
 */
class SuccessTemplateView extends TemplateView implements IView
{
    public function display()
    {
        $this->getView()->display('System/Success.tpl');
    }
}
