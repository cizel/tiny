<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */

class Config
{
    private static $item = null;
    private static $secret = null;
    /**
     * 获取INI的配置信息
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
        if (is_null(static::$item)) {
            static::$item = Yaf_Application::app()->getConfig();
        }
        return Arr::get(static::$item, $key, $default);
    }

    public static function getSecret($name, $key = null)
    {
        if (is_null(static::$secret)) {
            static::$secret = new Yaf_Config_Ini(Config::get('secret_path'));
        }

        if (is_null($key)) {
            return static::$secret->get($name);
        }
        return static::$secret->get($name)->get($key);
    }
}
