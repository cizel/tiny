<?php
/**
 * Tiny Api Framework.
 *
 * @link https://github.com/cizel/tiny
 *
 * @copyright 2017-2017 i@cizel.cn
 *
 */
namespace Tests\Library;

use Helper;
use Tests\TestCase;

/**
 * Class HelperTest
 * @package tests\Component
 */
class SupportHelperTest extends TestCase
{
    public function testValue()
    {
        $this->assertEquals('foo', Helper::value('foo'));
        $this->assertEquals('foo', Helper::value(function () {
            return 'foo';
        }));
    }
}
