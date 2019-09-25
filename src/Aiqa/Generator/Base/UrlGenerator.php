<?php

namespace Aiqa\Generator\Base;

use joshtronic\LoremIpsum;

class UrlGenerator
{
    private $lipsum;

    public function __construct()
    {
        $this->lipsum = new LoremIpsum();
    }

    public function getRandom()
    {
        return
            'http://' .
            $this->lipsum->word() . '.' .
            $this->lipsum->word() .
            '.example.net';
    }
}
