<?php
/**
 *  Bootstrap 启动
 */

use Support\Facades\Facade;
use Yaf_Bootstrap_Abstract as AbstractBootstrap;

class Bootstrap extends AbstractBootstrap
{
    /**
     * 添加路由
     */
    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {

    }

    public function _initConfig(Yaf_Dispatcher $dispatcher)
    {
        $app = \Core\Application::app();
        $app['config'] = new \Component\Config();
        Facade::setFacadeApplication($app);
    }
}
