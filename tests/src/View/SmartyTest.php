<?php
namespace Marmot\Framework\View;

use PHPUnit\Framework\TestCase;

class SmartyTest extends TestCase
{
    private $smarty;

    public function setUp()
    {
        $this->smarty = Smarty::getInstance();
    }

    public function tearDown()
    {
        unset($this->smarty);
    }

    public function testExtendsSmartBC()
    {
        $this->assertInstanceOf(
            '\SmartyBC',
            $this->smarty
        );
    }

    public function testGetPluginsDir()
    {
        $result = $this->smarty->getPluginsDir();
        $this->assertEquals('/var/www/html/'.Smarty::PLUGINS_DIR, $result[1]);
    }

    public function testConfigOverwrite()
    {
        $this->assertFalse($this->smarty->config_overwrite);
    }
}
