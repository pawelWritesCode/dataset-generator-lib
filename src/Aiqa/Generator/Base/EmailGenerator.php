<?php

namespace Aiqa\Generator\Base;

class EmailGenerator extends UsernameGenerator
{
    public function getRandom()
    {
        $username = parent::getRandom();

        return $username . '@aiqa.lh';
    }
}
