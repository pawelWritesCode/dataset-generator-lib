<?php

namespace spec\Aiqa\Generator\Base;

use Aiqa\Generator\Base\TestStatusGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TestStatusGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TestStatusGenerator::class);
    }

    function it_should_be_integer() {
        $this->getRandom()->shouldBeInteger();
    }
}
