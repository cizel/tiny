<?php
/**
 *  Bootstrap 启动
 */

use Support\Facades\Facade;
use Yaf_Bootstrap_Abstract as AbstractBootstrap;
use Support\Facades\Config;

class Bootstrap extends AbstractBootstrap
{

    public function _initConfig(Yaf_Dispatcher $dispatcher)
    {
        $app = \Core\Application::app();
        $app['config'] = new \Component\Config();
        Facade::setFacadeApplication($app);
        class_alias($key, $value);
    }

    public function _initClassAlias(Yaf_Dispatcher $dispatcher)
    {
        $classAlias = Config::get('alias');
        foreach ($classAlias as $key => $value) {
            class_alias($key, $value);
        }
    }

    /**
     * 添加路由
     */

    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        if ($routes = Config::get('routes')) {
            $dispatcher->getRouter()->addConfig($routes);
        }
    }

}
