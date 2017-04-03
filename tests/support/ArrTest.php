<?php
namespace tests\Component;

use Support\Test\YafCase as TestCase;
use Support\Arr;

/**
 * @coversDefaultClass \Config
 */
class ArrTest extends TestCase
{
    protected static $autoInit = false;

    protected static $useYaf = false;

    /**
     * @covers ::testContains
     */
    public function testAccessible()
    {
        $arr = [];
        $this->assertSame(true, Arr::accessible($arr));
        $arr = '1234';
        $this->assertSame(false, Arr::accessible($arr));
    }


}
