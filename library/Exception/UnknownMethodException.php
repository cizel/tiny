<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */
namespace Exception;

class UnknownMethodException extends \BadMethodCallException
{
    public function getName()
    {
        return 'Unknown Method';
    }
}
