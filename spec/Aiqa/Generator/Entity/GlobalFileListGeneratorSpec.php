<?php

namespace spec\Aiqa\Generator\Entity;

use Aiqa\Generator\Base\FilePathGenerator;
use Aiqa\Generator\Entity\GlobalFileListGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GlobalFileListGeneratorSpec extends ObjectBehavior
{
    function let(FilePathGenerator $filePathGenerator) {
        $this->beConstructedWith($filePathGenerator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GlobalFileListGenerator::class);
    }

    function it_should_return_random() {
        $this->getRandom()->shouldBeArray();
        $this->getRandom()->shouldHaveKey('fileName');

        $data = [
            ['fileName' => 'abc'],
            ['fileName' => './abc.php'],
            ['fileName' => 3]
        ];

        foreach ($data as $item) {
            $this->getRandom($item)->shouldBeLike($item);
        }
    }
}
