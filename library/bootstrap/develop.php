<?php
/**
 *  Bootstrap 启动
 */

use Support\Facades\Facade;
use Yaf_Bootstrap_Abstract as AbstractBootstrap;
use Support\Facades\Config;

class Bootstrap extends AbstractBootstrap
{

    public function _initConfig()
    {
        $app = \Core\Application::app();
        $app['config'] = new \Component\Config();
        Facade::setFacadeApplication($app);
    }

    public function _initClassAlias()
    {
        $classAlias = Config::get('alias')->toArray();
        foreach ($classAlias as $key => $value) {
            class_alias($key, $value);
        }
    }

    /**
     * 添加路由
     */

    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        $routes = Config::get('routes');

        if (!is_null($routes)) {
            $dispatcher->getRouter()->addConfig($routes);
        }
    }
}
