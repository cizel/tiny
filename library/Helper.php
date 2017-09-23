<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */

class Helper
{
    public static function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}
