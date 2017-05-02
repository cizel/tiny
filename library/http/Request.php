<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Http;

use Str;
use \Yaf_Dispatcher as Dispatcher;

class Request
{
    public static function url()
    {
        return static::getRequest()->getRequestUri();
    }

    public static function getContent()
    {
        return file_get_contents('php://input');
    }

    public static function method()
    {
        return static::getRequest()->getMethod();
    }

    /**
     * @param $method
     * @return bool
     */
    public static function isMethod($method)
    {
        if (static::getRequest()->getMethod() === strtoupper($method)) {
            return true;
        }
        return false;
    }

    public static function server($params)
    {
        return static::getRequest()->getServer($params);
    }

    public static function isJson()
    {
        if (Str::contains(static::server('CONTENT_TYPE'), '/json')) {
            return true;
        }
        return false;
    }

    public static function setParam($name, $value)
    {
        return static::getRequest()->setParam($name, $value);
    }
    public static function getActionName()
    {
        return static::getRequest()->getActionName();
    }
    public static function setActionName($action)
    {
        return static::getRequest()->setActionName($action);
    }
    public static function getControllerName()
    {
        return static::getRequest()->getControllerName();
    }

    public static function getModuleName()
    {
        return static::getRequest()->getModuleName();
    }

    private static function getRequest()
    {
        return Dispatcher::getInstance()->getRequest();
    }
}
