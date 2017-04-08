<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

use Support\Facades\Facade;
use Yaf_Bootstrap_Abstract as AbstractBootstrap;
use Support\Facades\Config;

define('TINY_ENV', 'develop');

class Bootstrap extends AbstractBootstrap
{

    public function _initConfig()
    {
        $app = \Web\Application::app();
        $app['config'] = new \Component\Config();
        Facade::setFacadeApplication($app);
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

    public function _initTiny()
    {
        Tiny::$container = new \Di\Container();
    }
}
