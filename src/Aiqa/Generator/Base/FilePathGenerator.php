<?php

namespace Aiqa\Generator\Base;

use joshtronic\LoremIpsum;

class FilePathGenerator
{
    private $lipsum;

    public function __construct()
    {
        $this->lipsum = new LoremIpsum();
    }

    public function getRandom()
    {
        return
            './' .
            $this->lipsum->word() . '/' .
            $this->lipsum->word() . '/' .
            $this->lipsum->word() .
            '.php';
    }
}
