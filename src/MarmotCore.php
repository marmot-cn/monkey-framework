<?php
/**
 * core 核心文件
 *
 * @author  chloroplast1983
 * @version 1.0.20131007
 */
namespace Marmot\Framework;

use Marmot\Basecode\MarmotCore as BaseMarmotCore;
use Marmot\Interfaces\Application\IFramework;

/**
 * 文件核心类
 *
 * @author  chloroplast1983
 * @version 1.0.20130916
 */
abstract class MarmotCore extends BaseMarmotCore
{
    protected $framework;
    
    protected function initFramework() : void
    {
        $this->framework = new Framework();
    }

    protected function getFramework() : IFramework
    {
        return $this->framework;
    }

    /**
     * @codeCoverageIgnore
     */
    protected function initMemcached(array $memcachedServices)
    {
        //初始化memcached缓存 -- 开始
        $memcached = new \Memcached();
        $memcached->addServers($memcachedServices);

        self::$cacheDriver = new \Doctrine\Common\Cache\MemcachedCache();
        self::$cacheDriver->setMemcached($memcached);
        self::$cacheDriver->setNamespace('phpcore');
        //初始化memcached缓存 -- 结束
    }

    protected function initHook() : void
    {
        $this->initSmarty();
    }
    
    protected function initSmarty()
    {
        $smarty = \Marmot\Framework\View\Smarty::getInstance();

        //smarty config
        $smarty->setTemplateDir($this->getAppPath().'src/View/Smarty/Templates/');
        $smarty->setCompileDir($this->getAppPath().'cache/Smarty/Compile/');
        $smarty->setCacheDir($this->getAppPath().'cache/Smarty/Cache/');
    }
}
