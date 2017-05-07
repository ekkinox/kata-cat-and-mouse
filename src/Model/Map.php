<?php

namespace Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Exception\AnimalOutOfBoundsException;
use Ekkinox\KataCatAndMouse\Exception\DuplicateAnimalException;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
class Map implements DrawableInterface
{
    /**
     * @var int
     */
    private $length;

    /**
     * @var array
     */
    private $map;

    /**
     * @var Cat
     */
    private $cat;

    /**
     * @var Mouse
     */
    private $mouse;

    /**
     * @param int $length
     */
    public function __construct(int $length)
    {
        $this->length = $length;
        $this->map    = array_fill(0, $this->length, null);
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @return Cat|null
     */
    public function getCat(): ?Cat
    {
        return $this->cat;
    }

    /**
     * @return Mouse|null
     */
    public function getMouse(): ?Mouse
    {
        return $this->mouse;
    }

    /**
     * @param Cat $cat
     *
     * @return Map
     *
     * @throws DuplicateAnimalException
     * @throws AnimalOutOfBoundsException
     */
    public function setCat(Cat $cat): self
    {
        if (null !== $this->cat) {
            throw new DuplicateAnimalException($cat);
        }

        $this->cat = $cat;

        return $this->addAnimalToMap($this->cat);
    }

    /**
     * @param Mouse $mouse
     *
     * @return Map
     *
     * @throws DuplicateAnimalException
     * @throws AnimalOutOfBoundsException
     */
    public function setMouse(Mouse $mouse): self
    {
        if (null !== $this->mouse) {
            throw new DuplicateAnimalException($mouse);
        }

        $this->mouse = $mouse;

        return $this->addAnimalToMap($this->mouse);
    }

    /**
     * @inheritDoc
     */
    public function getDrawing(): string
    {
        // TODO: Implement getDrawing() method.
    }


    /**
     * @param AbstractAnimal $animal
     *
     * @return Map
     *
     * @throws AnimalOutOfBoundsException
     */
    private function addAnimalToMap(AbstractAnimal $animal): self
    {
        if (!$this->isAnimalPositionValid($animal)) {
            throw new AnimalOutOfBoundsException($this, $animal);
        }

        $this->map[$animal->getPosition()] = $animal;

        return $this;
    }

    /**
     * @param AbstractAnimal $animal
     *
     * @return bool
     */
    private function isAnimalPositionValid(AbstractAnimal $animal)
    {
        return $this->length >= $animal->getPosition();
    }
}
