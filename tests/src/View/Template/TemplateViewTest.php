<?php
namespace Marmot\Framework\View\Template;

use PHPUnit\Framework\TestCase;

class TemplateViewTest extends TestCase
{
    private $templateView;

    public function setUp()
    {
        $this->templateView = new MockTemplateView();
    }

    public function tearDown()
    {
        unset($this->templateView);
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\View\Smarty',
            $this->templateView->getView()
        );
        $this->assertEquals('', $this->templateView->getData());
    }
}
