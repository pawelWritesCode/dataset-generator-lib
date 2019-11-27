<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\Base\ExtensionGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;
use joshtronic\LoremIpsum;

/**
 * Class Tc - generates tc
 * @package Aiqa\Generator\Entity
 */
class TcGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var LoremIpsum
     */
    private $loremIpsumGenerator;

    /**
     * @var ExtensionGenerator
     */
    private $extensionGenerator;

    /**
     * TcGenerator constructor.
     * @param ExtensionGenerator $extensionGenerator
     */
    public function __construct(ExtensionGenerator $extensionGenerator)
    {
        $this->loremIpsumGenerator = new LoremIpsum();
        $this->extensionGenerator = $extensionGenerator;
    }

    public function getRandom($data = [])
    {
        $result = [];
        $result['fileName'] = isset($data['fileName']) ?
            (string) $data['fileName'] :
            './' . $this->loremIpsumGenerator->words(1) . '/' . $this->loremIpsumGenerator->words(1) . $this->extensionGenerator->getRandom();

        return $result;
    }

}