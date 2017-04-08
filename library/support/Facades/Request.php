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
 * Class Request
 * @method    static mixed    method()
 * @method    static bool    isMethod(string $name)
 * @method    static mixed    server(string $key)
 * @method    static mixed    input()
 */
class Request extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new \Web\Request();
    }
}