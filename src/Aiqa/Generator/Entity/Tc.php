<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\RandomDataGeneratorInterface;
use joshtronic\LoremIpsum;

/**
 * Class Tc - generates tc
 * @package Aiqa\Generator\Entity
 */
class Tc implements RandomDataGeneratorInterface
{
    /**
     * @var LoremIpsum
     */
    private $loremIpsumGenerator;

    /**
     * Tc constructor.
     */
    public function __construct()
    {
        $this->loremIpsumGenerator = new LoremIpsum();
    }

    public function getRandom($data = [])
    {
        $result = [];
        $result['fileName'] = isset($data['fileName']) ?
            (string) $data['fileName'] :
            $this->loremIpsumGenerator->words(1) . '/' . $this->loremIpsumGenerator->words(1);

        return $result;
    }
}