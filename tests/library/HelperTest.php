<?php

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
