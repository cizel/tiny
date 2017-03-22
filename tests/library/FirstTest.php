<?php
namespace tests\library;

use \Test\YafCase as TestCase;

/**
 * @coversDefaultClass \Config
 */
class FirstTest extends TestCase
{
    protected static $autoInit = false;

    protected static $useYaf = false;

    public function testSum()
    {
        $this->assertEquals(3, array_sum([1,2]));
    }

}
