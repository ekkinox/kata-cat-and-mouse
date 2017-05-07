<?php

namespace Ekkinox\KataCatAndMouse\Factory;

use Ekkinox\KataCatAndMouse\Model\AbstractAnimal;
use Ekkinox\KataCatAndMouse\Model\Cat;
use Ekkinox\KataCatAndMouse\Model\Mouse;

/**
 * @package Ekkinox\KataCatAndMouse\Factory
 */
class AnimalFactory
{
    /**
     * @param string $class
     * @param int    $position
     *
     * @return AbstractAnimal|Cat|Mouse
     */
    public function create(string $class, int $position): AbstractAnimal
    {
        /** @var AbstractAnimal $animal */
        $animal = new $class();

        return $animal->setPosition($position);
    }
}
