<?php

namespace Aiqa\Generator\Base;

use joshtronic\LoremIpsum;

class LoremIpsumGenerator
{
    private $lipsum;

    public function __construct()
    {
        $this->lipsum = new LoremIpsum();
    }

    public function getRandom()
    {
        return $this->lipsum->sentences(8);
    }
}
