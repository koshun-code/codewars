<?php

namespace CodeWars\Tests;

use PHPUnit\Framework\TestCase;
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
}