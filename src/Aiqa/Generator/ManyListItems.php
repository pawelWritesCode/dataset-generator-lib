<?php

namespace Aiqa\Generator;

abstract class ManyListItems extends OneListItem
{
    public function getRandom()
    {
        $number = rand(1, 5);
        $selectedItems = [];

        for ($i = 0; $i < $number; $i++) {
            $selectedItems[] = parent::getRandom();
        }

        $selectedItems = array_unique($selectedItems);
        sort($selectedItems);

        return implode(', ', $selectedItems);
    }

    public function setItems($items)
    {
        $this->items = $items;
        $this->count = count($this->items);
    }
}
