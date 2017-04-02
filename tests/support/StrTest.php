<?php
namespace tests\Component;

use Support\Test\YafCase as TestCase;
use Support\Str;

/**
 * @coversDefaultClass \Config
 */
class StrTest extends TestCase
{
    protected static $autoInit = false;

    protected static $useYaf = false;

    /**
     * @covers ::testContains
     */
    public function testContains()
    {
        $haystack = 'Tiny Framework';
        $needles = $haystack[rand(0, strlen($haystack) - 1)];
        $this->assertSame(true, Str::contains($haystack, $needles)) ;
    }

    public function testContainsEmpty()
    {
        $haystack = 'Tiny Framework';
        $this->assertSame(false, Str::contains($haystack, null));
        $this->assertSame(false, Str::contains($haystack, ""));
        $this->assertSame(false, Str::contains($haystack, false));
        $this->assertSame(false, Str::contains($haystack, true));
    }

    public function testContainsTop()
    {
        $haystack = 'Tiny Framework';
        $needles = substr($haystack, 0, 2);
        $this->assertSame(true, Str::contains($haystack, $needles));
    }

}
