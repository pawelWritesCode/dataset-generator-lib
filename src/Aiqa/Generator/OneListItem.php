<?php

namespace Aiqa\Generator;

abstract class OneListItem implements RandomDataGeneratorInterface
{
    protected $items;
    protected $count;

    public function __construct()
    {
        $this->items = [];
        $this->count = count($this->items);
    }

    public function getRandom()
    {
        $i = rand(0, $this->count - 1);

        return $this->items[$i];
    }

    public function setItems($items)
    {
        $this->items = $items;
        $this->count = count($this->items);
    }
}
