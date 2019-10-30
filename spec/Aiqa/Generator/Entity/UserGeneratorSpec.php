<?php

namespace spec\Aiqa\Generator\Entity;

use Aiqa\Generator\Entity\UserGenerator;
use Aiqa\Generator\Base\MaleGenerator;
use Aiqa\Generator\Base\UsernameGenerator;
use Aiqa\Generator\Base\EmailGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


class UserGeneratorSpec extends ObjectBehavior
{
    public function let(
        MaleGenerator $maleGenerator,
        UsernameGenerator $usernameGenerator,
        EmailGenerator $emailGenerator
    ) {
        $this->beConstructedWith(
            $maleGenerator,
            $usernameGenerator,
            $emailGenerator
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserGenerator::class);
    }

    function it_should_return_random_data()
    {
        $this->getRandom()->shouldBeArray();
        $this->getRandom()->shouldHaveCount(6);
        $this->getRandom()->shouldHaveKey('firstName');
        $this->getRandom()->shouldHaveKey('lastName');
        $this->getRandom()->shouldHaveKey('email');
        $this->getRandom()->shouldHaveKey('username');
        $this->getRandom()->shouldHaveKey('password');
        $this->getRandom()->shouldHaveKey('enabled');
    }
}
