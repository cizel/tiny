<?php
namespace tests\Component;

use Support\Test\YafCase as TestCase;
use Support\Helper;

/**
 * Class HelperTest
 * @package tests\Component
 */
class SupportHelperTest extends TestCase
{
    protected static $autoInit = false;

    protected static $useYaf = false;

    public function testValue()
    {
        $this->assertEquals('foo', Helper::value('foo'));
        $this->assertEquals('foo', Helper::value(function () {
            return 'foo';
        }));
    }
}
