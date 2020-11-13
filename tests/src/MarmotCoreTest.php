<?php
namespace Marmot\Framework;

use Marmot\Core;
use PHPUnit\Framework\TestCase;
use Marmot\Framework\MockApplication;
use Marmot\Framework\Application\IApplication;

class MarmotCoreTest extends TestCase
{
    public function testInitFramework()
    {
        $marmotCore = new MockMarmotCore();
        $marmotCore->initFramework();
        $frameWork = $marmotCore->getFrameWork();
        $this->assertInstanceOf('Marmot\Interfaces\Application\IFramework', $frameWork);
    }

    public function testInitSmarty()
    {
        $marmotCore = new MockMarmotCore();
        $marmotCore->mockInitSmarty();
        $smarty = \Marmot\Framework\View\Smarty::getInstance();

        $this->assertEquals(
            $smarty->getTemplateDir()[0],
            $marmotCore->getAppPath().'src/View/Smarty/Templates/'
        );

        $this->assertEquals(
            $smarty->getCompileDir(),
            $marmotCore->getAppPath().'cache/Smarty/Compile/'
        );

        $this->assertEquals(
            $smarty->getCacheDir(),
            $marmotCore->getAppPath().'cache/Smarty/Cache/'
        );
    }
}
