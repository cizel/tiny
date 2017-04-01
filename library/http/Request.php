<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Http;

use Support\Str;
use \Yaf_Dispatcher as Dispatcher;

class Request
{
    public function url()
    {
        return static::getRequest()->getRequestUri();
    }

    public function getContent()
    {
        return file_get_contents('php://input');
    }

    public function method()
    {
        return static::getRequest()->getMethod();
    }

    /**
     * @param $method
     * @return bool
     */
    public function isMethod($method)
    {
        if (static::getRequest()->getMethod() === strtoupper($method)) {
            return true;
        }
        return false;
    }

    public function server($params)
    {
        return static::getRequest()->getServer($params);
    }

    public function isJson()
    {
        if (Str::contains(static::server('CONTENT_TYPE'), '/json')) {
            return true;
        }
        return false;
    }

    public function setParam($name, $value)
    {
        return static::getRequest()->setParam($name, $value);
    }
    public function getActionName()
    {
        return static::getRequest()->getActionName();
    }
    public function setActionName($action)
    {
        return static::getRequest()->setActionName($action);
    }
    public function getControllerName()
    {
        return static::getRequest()->getControllerName();
    }

    public function getModuleName()
    {
        return static::getRequest()->getModuleName();
    }

    private static function getRequest()
    {
        return Dispatcher::getInstance()->getRequest();
    }
}
