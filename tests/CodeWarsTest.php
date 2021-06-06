<?php

namespace CodeWars\Tests;

use PHPUnit\Framework\TestCase;

use function CodeWars\CodeWars\binarySearch;
use function CodeWars\CodeWars\duplicateCount;
use function CodeWars\CodeWars\duplicateEncode;
use function CodeWars\CodeWars\high;
use function CodeWars\CodeWars\iter;
use function CodeWars\CodeWars\spinWords;

class CodeWarsTest extends TestCase 
{
    public function testHigh(): void
    {
        $this->assertEquals('', high(''));
        $this->assertEquals('taxi', high('I take taxi to Ubud'));
    }

    public function testIter(): void
    {
        $this->assertEquals(54, iter('taxi'));
        $this->assertEquals(48, iter('ubud'));
    }

    public function testSpinWords()
    {
        $this->assertEquals('My new jins was lufetuaeb', spinWords('My new jins was beauteful'));
        $this->assertEquals('Thri two find', spinWords('Thri two find'));
        $this->assertEquals('', '');
    }

    public function testBinarySearch()
    {
        $this->assertEquals(3, binarySearch([3, 5, 7, 18, 33], 18));
        $this->assertNull(binarySearch([], 18));
    }

    public function testDuplicateEncode()
    {
        $this->assertEquals('(((', duplicateEncode('din'));
        $this->assertEquals('()()()', duplicateEncode('recede'));
        $this->assertEquals(')))))', duplicateEncode('iiiii'));
        $this->assertEquals(')())())', duplicateEncode('Success'));
        $this->assertEquals('))((', duplicateEncode('(( @'));
        $this->assertEquals('(', duplicateEncode(''));
    }

    public function testDuplicateCount()
    {
        $this->assertEquals(1, duplicateCount('indivisibility'));
        $this->assertEquals(0, duplicateCount('abcde'));
        $this->assertEquals(2, duplicateCount('aabBcde'));
        $this->assertEquals(2, duplicateCount('ABBA'));
    }
}