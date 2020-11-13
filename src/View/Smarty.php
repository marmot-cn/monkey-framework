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

    const PLUGINS_DIR = 'Smarty/Plugins/';

    public function __construct()
    {
        parent::__construct();
        $this->addPluginsDir(self::PLUGINS_DIR);
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
