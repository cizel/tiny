<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 */

namespace base;

interface ArrayAble
{
    public function fields();
    public function extraFields();
    public function toArray(array $fields = [], array $expand = [], $recursive = true);
}