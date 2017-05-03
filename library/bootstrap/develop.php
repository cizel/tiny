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
use Providers\BaseServiceProvider;

class Bootstrap extends AbstractBootstrap
{
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

    public function _initAutoload(Yaf_Dispatcher $dispatcher)
    {
        Yaf_Loader::import(APP_PATH . "/vendor/autoload.php");  
    }
}
