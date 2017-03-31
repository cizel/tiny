<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace Support\Facades;

/**
 * Class Config
 * @method    static mixed    get(string $key, mixed $default = null)    Get the specified configuration value.
 */
class Config extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'config';
    }
}