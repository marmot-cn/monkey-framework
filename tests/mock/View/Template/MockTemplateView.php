<?php
namespace Marmot\Framework\View\Template;

use Marmot\Framework\View\Smarty;

class MockTemplateView extends TemplateView
{
    public function getView()
    {
        return parent::getView();
    }

    public function getData()
    {
        return parent::getData();
    }
}
