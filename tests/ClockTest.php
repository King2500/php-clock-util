<?php

namespace ThomasSchulz\ClockUtil\Tests;

use Prophecy\Prophet;
use ThomasSchulz\ClockUtil\Clock;
use ThomasSchulz\ClockUtil\ClockInterface;

class ClockTest extends \PHPUnit_Framework_TestCase
{
    public function testMethod()
    {
        $this->getMockBuilder(Clock::class)
            ->setMethods(array('test1'));

        $this->getMock('\ThomasSchulz\ClockUtil\Clock', array('test1'));
        $this->getMockClass('\ThomasSchulz\ClockUtil\Clock', array('test1'));
//        $this->getMockForAbstractClass('\ThomasSchulz\ClockUtil\Clock', array(), '', true, true, true, array());
//        $this->getMockForTrait('\ThomasSchulz\ClockUtil\Clock', array(), '', true, true, true, array());

        $mock1 = $this->getMockBuilder(Clock::class)
            ->getMock();
        $mock1->expects($this->once())->method('test1')->willReturnCallback(function() { echo 'stubbed test1'; });
        $mock1->expects($this->once())->method('test2')->willReturnCallback(function() { echo 'stubbed test2'; });
        $mock1->test1('arg1');
        $mock1->test2();
        $this->doSomethingWithClock($mock1);

        $mock2 = $this->getMock(Clock::class, array('test1'));
        $mock2->expects($this->once())->method('test1')->willReturnCallback(function() { echo 'stubbed test1'; });
        $mock2->test1('arg1');
        $mock2->test2();
        $this->doSomethingWithClock($mock2);

        $mock3 = $this->mockClock();
        $mock3->expects($this->once())->method('test1');
        $mock3->test1('arg1');
        $this->doSomethingWithClock($mock3);

        $prophecy = $this->prophesize(Clock::class);
        $prophecy->test1('arg1')->shouldBeCalled();
        $prophecy->test2()->willReturn(new \DateTime());
        $mock4 = $prophecy->reveal();
        $mock4->test1('arg1');
        $mock4->test2();
        $this->doSomethingWithClock($mock4);

        $prophet = new Prophet();
        $prophecy = $prophet->prophesize(Clock::class);
        $prophecy->test1('arg1')->shouldBeCalled();
        $prophecy->test2()->willReturn(new \DateTime());
        $mock5 = $prophecy->reveal();
        $mock5->test1('arg1');
        $mock5->test2();
        $this->doSomethingWithClock($mock5);
    }

    private function doSomethingWithClock(ClockInterface $clock)
    {
        $clock->test1('arg1');
        $clock->test2();
    }

    private function mockClock()
    {
        return $this->getMock(Clock::class, array('test1'));
    }
}
