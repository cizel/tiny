<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Support\Facades;

class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}