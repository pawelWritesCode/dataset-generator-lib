<?php

namespace spec\Aiqa\Generator\Entity;

use Aiqa\Generator\Base\ExtensionGenerator;
use Aiqa\Generator\Entity\TcGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TcGeneratorSpec extends ObjectBehavior
{
    function let(ExtensionGenerator $extensionGenerator) {
        $this->beConstructedWith($extensionGenerator);
    }

    function it_is_initializable()
    {
        $this->shouldImplement(RandomDataGeneratorInterface::class);
        $this->shouldHaveType(TcGenerator::class);
    }

    function it_should_generate_random(ExtensionGenerator $extensionGenerator) {
        $extensionGenerator->getRandom()->willReturn('.feature');
        $this->getRandom()->shouldBeArray();
        $this->getRandom()->shouldHaveKey('fileName');
    }

    function it_should_generate_with_given_data() {
        $dataSet = [
            ['data' => ['fileName' => 'abc'], 'result' =>'abc'],
            ['data' => ['fileName' => '1'], 'result' => '1'],
            ['data' => ['fileName' => 1], 'result' => '1'],
            ['data' => ['fileName' => true], 'result' => "1"],
            ['data' => ['fileName' => false], 'result' => ""],
            ['data' => ['fileName' => 'long.string/with/śīmbóls123'], 'result' => "long.string/with/śīmbóls123"],
        ];

        foreach ($dataSet as ['data' => $data, 'result' => $result]) {
            $this->getRandom($data)->shouldBeArray();
            $this->getRandom($data)->shouldHaveKeyWithValue('fileName', $result);
        }
    }
}
