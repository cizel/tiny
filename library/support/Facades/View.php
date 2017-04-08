<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace support\Facades;

/**
 * Class View
 * @method    static mixed    disable()
 */
class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \Web\View();
    }
}