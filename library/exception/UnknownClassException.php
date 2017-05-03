<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace exception;

class UnknownClassException extends Exception
{
    public function getName()
    {
        return 'Unknown Class';
    }
}
