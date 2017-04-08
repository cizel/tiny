<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace exception;


class InvalidRouteException extends UserException
{
    public function getName()
    {
        return 'Invalid Route';
    }
}
