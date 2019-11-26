<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\Base\DateGenerator;
use Aiqa\Generator\Base\LoremIpsumGenerator;
use Aiqa\Generator\Base\TestStatusGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;
use Aiqa\Generator\Base\MaleGenerator;
use Aiqa\Generator\Base\UsernameGenerator;
use Aiqa\Generator\Base\EmailGenerator;
use joshtronic\LoremIpsum;

/**
 * Class BuildGenerator - generates build.
 * @package Aiqa\Generator\Entity
 */
class BuildGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var UsernameGenerator
     */
    private $usernameGenerator;

    /**
     * @var DateGenerator
     */
    private $dateGenerator;

    /**
     * @var EmailGenerator
     */
    private $emailGenerator;

    /**
     * @var LoremIpsum
     */
    private $loremIpsumGenerator;

    /**
     * @var TestStatusGenerator
     */
    private $testStatusGenerator;

    /**
     * BuildGenerator constructor.
     * @param UsernameGenerator $usernameGenerator
     * @param EmailGenerator $emailGenerator
     * @param DateGenerator $dateGenerator
     * @param TestStatusGenerator $testStatusGenerator
     */
    public function __construct(
        UsernameGenerator $usernameGenerator,
        EmailGenerator $emailGenerator,
        DateGenerator $dateGenerator,
        TestStatusGenerator $testStatusGenerator
    ) {
        $this->usernameGenerator = $usernameGenerator;
        $this->emailGenerator = $emailGenerator;
        $this->dateGenerator = $dateGenerator;
        $this->loremIpsumGenerator = new LoremIpsum();
        $this->testStatusGenerator = $testStatusGenerator;
    }

    public function getRandom($data = [])
    {
        $result = [];

        $result['hashBaseBranch'] = isset($data['hashBaseBranch']) ?
            $data['hashBaseBranch'] :
            $this->loremIpsumGenerator->words(1);

        $result['hashFeatBranch'] = isset($data['hashFeatBranch']) ?
            $data['hashFeatBranch'] :
            $this->loremIpsumGenerator->words(1);

        $result['start'] = isset($data['start']) ?
            $data['start'] :
            $this->dateGenerator->getRandom();

        $result['stop'] = isset($data['stop']) ?
            $data['stop'] :
            $this->dateGenerator->getRandom();

        $this->emailGenerator->setPrefix('JohnDoe');
        $result['email'] = isset($data['email']) ? $data['email'] : $this->emailGenerator->getRandom();

        $result['status'] = isset($data['status']) ?
            $data['status'] :
            $this->testStatusGenerator->getRandom();

        $result['baseBranch'] = isset($data['baseBranch']) ?
            $data['baseBranch'] :
            $this->loremIpsumGenerator->words(1);

        $result['featBranch'] = isset($data['featBranch']) ?
            $data['featBranch'] :
            $this->loremIpsumGenerator->words(1);

        return $result;
    }
}