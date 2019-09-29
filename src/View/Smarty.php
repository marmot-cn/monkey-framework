<?php
namespace Marmot\Framework\View;

/**
 * Smarty 模板类
 *
 * @author chloroplast
 */
class Smarty extends \SmartyBC
{
    private static $instance;

    public function __construct()
    {
        parent::__construct();
        $this->addPluginsDir('Smarty/Plugins');
        $this->config_overwrite = false;
    }

    public static function &getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
