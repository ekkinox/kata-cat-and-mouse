<?php

namespace Ekkinox\KataCatAndMouse\Model;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
abstract class AbstractAnimal implements DrawableInterface
{
    /**
     * @var int
     */
    private $position;

    /**
     * @return int
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return AbstractAnimal
     */
    public function setPosition($position): self
    {
        $this->position = $position;

        return $this;
    }
}
