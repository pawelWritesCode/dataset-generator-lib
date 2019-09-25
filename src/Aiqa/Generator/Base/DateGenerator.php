<?php

namespace Aiqa\Generator\Base;

use Aiqa\Generator\RandomDataGeneratorInterface;

class DateGenerator implements RandomDataGeneratorInterface
{
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    public function rewindNYears($n)
    {
        $this->date->add(new \DateInterval(
            sprintf('P%sY', $n)
        ));
    }

    public function getRandom()
    {
        $days = rand(0, 366);
        $this->date->add(new \DateInterval(
            sprintf('P%sD', $days)
        ));

        return $this->date->format('Y-m-d');
    }
}
