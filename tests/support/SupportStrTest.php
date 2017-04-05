<?php
namespace tests\Component;

use Support\Test\YafCase as TestCase;
use Support\Str;

/**
 * @coversDefaultClass \Config
 */
class SupportStrTest extends TestCase
{
    protected static $autoInit = false;

    protected static $useYaf = false;

    /**
     * @covers ::testContains
     */
    public function testStrContains()
    {
        $this->assertTrue(Str::contains('taylor', 'ylo'));
        $this->assertTrue(Str::contains('taylor', 'taylor'));
        $this->assertTrue(Str::contains('taylor', ['ylo']));
        $this->assertTrue(Str::contains('taylor', ['xxx', 'ylo']));
        $this->assertFalse(Str::contains('taylor', 'xxx'));
        $this->assertFalse(Str::contains('taylor', ['xxx']));
        $this->assertFalse(Str::contains('taylor', ''));
    }
}
