<?php

namespace Aiqa\Generator\Base;

use Symfony\Component\Yaml\Yaml;

class MaleGenerator
{
    private $yaml;

    private $firstNames;
    private $firstNamesCount;

    private $lastNames;
    private $lastNamesCount;

    public function __construct(Yaml $yaml)
    {
        $this->yaml = $yaml;

        $firstNamesFilename = '../fixtures/male-first-names.yml';
        $this->firstNames = $yaml->parseFile($firstNamesFilename);
        $this->firstNamesCount = count($this->firstNames);

        $lastNamesFilename = '../fixtures/male-last-names.yml';
        $this->lastNames = $yaml->parseFile($lastNamesFilename);
        $this->lastNamesCount = count($this->lastNames);
    }

    public function getRandomFirstName()
    {
        $i = rand(0, $this->firstNamesCount - 1);

        return $this->firstNames[$i];
    }

    public function getRandomLastName()
    {
        $i = rand(0, $this->lastNamesCount - 1);

        return ucfirst($this->lastNames[$i]);
    }
}
