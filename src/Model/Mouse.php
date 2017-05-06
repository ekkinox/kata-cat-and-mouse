<?php

namespace Ekkinox\KataCatAndMouse\Model;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
class Mouse extends AbstractAnimal
{
    /**
     * @inheritdoc
     */
    public function getDrawing(): ?string
    {
        return 'm';
    }
}
