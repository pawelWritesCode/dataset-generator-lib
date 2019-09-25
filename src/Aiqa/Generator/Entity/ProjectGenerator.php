<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\Base\UrlGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;

class ProjectGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var UrlGenerator
     */
    private $urlGenerator;

    public function __construct(
        UrlGenerator $urlGenerator
    ) {
        $this->urlGenerator = $urlGenerator;
    }

    public function getRandom()
    {
        $result = [];
        $result['name'] = 'Rand_project_' . rand(1, 1000) . rand(1, 1000);
        $result['url'] = $this->urlGenerator->getRandom();

        return $result;
    }
}
