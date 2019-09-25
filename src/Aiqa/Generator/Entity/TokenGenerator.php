<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\Base\EmailGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;

class TokenGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var emailGenerator
     */
    private $emailGenerator;

    public function __construct(
        EmailGenerator $emailGenerator
    ) {
        $this->emailGenerator = $emailGenerator;
    }

    public function getRandom()
    {
        $token = [];
        $token['email'] = $this->emailGenerator->getRandom();
        $token['token'] = sha1(random_bytes(100));

        return $token;
    }
}
