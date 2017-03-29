<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Core;

use ArrayAccess;
use Support\Arr;

class Application implements ArrayAccess
{
    protected static $app;
    protected static $component = [];
    public static function app()
    {
        if (!self::$app) {
            self::$app = new self();
        }
        return self::$app;
    }

    public function offsetExists($offset)
    {
        return Arr::exists(static::$component, $offset);
    }

    public function offsetGet($offset)
    {
        return Arr::get(static::$component, $offset);
    }

    public function offsetSet($offset, $value)
    {
        Arr::set(static::$component, $offset, $value);
    }

    public function offsetUnset($offset)
    {
        Arr::except(static::$component, $offset);
    }
}