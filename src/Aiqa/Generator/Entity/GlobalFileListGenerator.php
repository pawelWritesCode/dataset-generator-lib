<?php

namespace Aiqa\Generator\Entity;

use Aiqa\Generator\Base\FilePathGenerator;
use Aiqa\Generator\RandomDataGeneratorInterface;

class GlobalFileListGenerator implements RandomDataGeneratorInterface
{
    /**
     * @var FilePathGenerator
     */
    private $filePathGenerator;

    /**
     * GlobalFileListGenerator constructor.
     * @param FilePathGenerator $filePathGenerator
     */
    public function __construct(FilePathGenerator $filePathGenerator)
    {
        $this->filePathGenerator = $filePathGenerator;
    }

    public function getRandom($data = [])
    {
        $result = [];

        $result['fileName'] = isset($data['fileName']) ?
            (string) $data['fileName'] :
            $this->filePathGenerator->getRandom();

        return $result;
    }
}
