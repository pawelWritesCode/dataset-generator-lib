<?php

namespace Aiqa\Generator\Base;

/**
 * Class ExtensionGenerator - generates random file extension.
 * @package Aiqa\Generator\Base
 */
class ExtensionGenerator
{
    private $extensions = ['.jpg', '.jpeg', '.png', '.exe', '.sh', '.php', '.js', '.dmg', '.feature', '.txt', '.doc', '.csv', '.docx', '.vba', '.pdf', '.html', '.htm', '.gif'];

    public function getRandom()
    {
        return $this->extensions[random_int(0, (count($this->extensions) - 1))];
    }
}
