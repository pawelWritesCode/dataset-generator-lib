<?php

namespace spec\Aiqa\Generator\Entity;

use Aiqa\Generator\Base\DateGenerator;
use Aiqa\Generator\Base\EmailGenerator;
use Aiqa\Generator\Base\TestStatusGenerator;
use Aiqa\Generator\Base\UsernameGenerator;
use Aiqa\Generator\Entity\BuildGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuildGeneratorSpec extends ObjectBehavior
{
    function let(
        UsernameGenerator $usernameGenerator,
        EmailGenerator $emailGenerator,
        DateGenerator $dateGenerator,
        TestStatusGenerator $testStatusGenerator
    ) {
        $this->beConstructedWith(
            $usernameGenerator,
            $emailGenerator,
            $dateGenerator,
            $testStatusGenerator
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BuildGenerator::class);
    }

    function it_should_return_random() {
        $this->getRandom()->shouldBeArray();
        $this->getRandom()->shouldHaveKey('hashBaseBranch');
        $this->getRandom()->shouldHaveKey('hashFeatBranch');
        $this->getRandom()->shouldHaveKey('start');
        $this->getRandom()->shouldHaveKey('stop');
        $this->getRandom()->shouldHaveKey('email');
        $this->getRandom()->shouldHaveKey('status');
        $this->getRandom()->shouldHaveKey('baseBranch');
        $this->getRandom()->shouldHaveKey('featBranch');
        $this->getRandom()->shouldHaveKey('fullSet');
    }

    function it_should_return_modified() {
        $data = [
            'hashBaseBranch' => 'a',
            'hashFeatBranch' => 'b',
            'start' => '0000-00-00',
            'stop' => '1111-11-11',
            'email' => 'a@b.c',
            'status' => 20,
            'baseBranch' => 'a',
            'featBranch' => 'z',
            'fullSet' => 1
        ];

        $this->getRandom($data)->shouldBeLike($data);
    }

    function it_should_modify_some_fields_only() {
        $data = [
            'hashBaseBranch' => 'a',
            'hashFeatBranch' => 'b',
        ];

        $this->getRandom($data)->shouldBeArray();
        $this->getRandom($data)->shouldHaveKeyWithValue('hashBaseBranch', 'a');
        $this->getRandom($data)->shouldHaveKeyWithValue('hashFeatBranch', 'b');
        $this->getRandom($data)->shouldHaveKey('start');
        $this->getRandom($data)->shouldHaveKey('stop');
        $this->getRandom($data)->shouldHaveKey('email');
        $this->getRandom($data)->shouldHaveKey('status');
        $this->getRandom($data)->shouldHaveKey('baseBranch');
        $this->getRandom($data)->shouldHaveKey('featBranch');
        $this->getRandom($data)->shouldHaveKey('fullSet');
    }
}
