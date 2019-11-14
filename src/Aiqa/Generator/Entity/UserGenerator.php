<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\RandomDataGeneratorInterface;
use Aiqa\Generator\Base\MaleGenerator;
use Aiqa\Generator\Base\UsernameGenerator;
use Aiqa\Generator\Base\EmailGenerator;

class UserGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var MaleGenerator
     */
    private $maleGenerator;

    /**
     * @var UsernameGenerator
     */
    private $usernameGenerator;

    /**
     * @var EmailGenerator
     */
    private $emailGenerator;

    public function __construct(
        MaleGenerator $maleGenerator,
        UsernameGenerator $usernameGenerator,
        EmailGenerator $emailGenerator
    ) {
        $this->maleGenerator = $maleGenerator;
        $this->usernameGenerator = $usernameGenerator;
        $this->emailGenerator = $emailGenerator;
    }

    public function getRandom($data = [])
    {
        $result = [];
        if (isset($data['firstName'])) {
            $result['firstName'] = $data['firstName'];
        } else {
            $result['firstName'] = $this->maleGenerator->getRandomFirstName();
        }
        $result['lastName'] = $this->maleGenerator->getRandomLastName();

        $this->emailGenerator->setPrefix($result['firstName']);
        $result['email'] = $this->emailGenerator->getRandom();

        $result['username'] = $result['email'];

        $result['password'] = 'Somepass123';

        $result['enabled'] = true;

        return $result;
    }
}
