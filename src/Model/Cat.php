<?php

namespace Ekkinox\KataCatAndMouse\Model;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
class Cat extends AbstractAnimal
{
    /**
     * @inheritdoc
     */
    public function getDrawing(): string
    {
        return 'C';
    }
}
