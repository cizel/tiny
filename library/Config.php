<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */
class Config
{
    private static $item = null;
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
}
