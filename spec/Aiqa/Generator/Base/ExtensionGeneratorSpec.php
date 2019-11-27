<?php

namespace spec\Aiqa\Generator\Base;

use Aiqa\Generator\Base\ExtensionGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ExtensionGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ExtensionGenerator::class);
    }

    function it_should_return_random() {
        $this->getRandom()->shouldBeString();
    }
}
