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

class InvalidValueException extends \UnexpectedValueException
{
    public function getName()
    {
        return 'Invalid Return Value';
    }
}
