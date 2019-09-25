<?php

namespace Aiqa\Generator\Base;

use Aiqa\Generator\RandomDataGeneratorInterface;

class UsernameGenerator implements RandomDataGeneratorInterface
{
    private $randomString;
    private $prefix = 'jan';

    public function __construct()
    {
        $this->regenerateRandomString();
    }

    public function setPrefix($prefix)
    {
        $this->prefix = strtolower(preg_replace(
            '/[^A-Za-z]/',
            'X',
            $prefix
        ));
    }

    public function regenerateRandomString()
    {
        $this->randomString = sha1(
            random_bytes(100) .
            spl_object_hash($this) .
            random_bytes(100) .
            var_export($this, true)
        );
    }

    public function getRandom()
    {
        $this->regenerateRandomString();

        return $this->prefix . $this->randomString;
    }
}
