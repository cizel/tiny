<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Component;

use Yaf_Application;
use Support\Arr;

class Config
{
    protected $items = [];

    protected static $app;

    public function __construct()
    {
        $this->items = Yaf_Application::app()->getConfig();
    }

    /**
     * 获取INI的配置信息
     * @param $key
     * @param null $default
     * @return mixed|null
     */

    public function get($key, $default = null)
    {
        return Arr::get($this->items, $key, $default);
    }
}
