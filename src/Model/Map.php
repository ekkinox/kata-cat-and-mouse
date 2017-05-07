<?php

namespace Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Exception\AnimalOutOfBoundsException;
use Ekkinox\KataCatAndMouse\Exception\DuplicateAnimalException;
use Ekkinox\KataCatAndMouse\Exception\NonFreePositionException;

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
     * @return int
     */
    public function getRowLength(): int
    {
        return ceil(sqrt($this->length));
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
     * @throws NonFreePositionException
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
     * @throws NonFreePositionException
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
        $drawing  = '';

        foreach ($this->map as $key => $value) {
            if ($value instanceof AbstractAnimal) {
                $drawing .= $value->getDrawing();
            } else {
                $drawing .= '.';
            }
            if ($key !== 0 && (($key+1) % $this->getRowLength() == 0)) {
                $drawing .= PHP_EOL;
            }
        }

        return $drawing;
    }


    /**
     * @param AbstractAnimal $animal
     *
     * @return Map
     *
     * @throws AnimalOutOfBoundsException
     * @throws NonFreePositionException
     */
    private function addAnimalToMap(AbstractAnimal $animal): self
    {
        if (!$this->isAnimalPositionValid($animal)) {
            throw new AnimalOutOfBoundsException($this, $animal);
        }

        if (!$this->isPositionFree($animal->getPosition())) {
            throw new NonFreePositionException($animal->getPosition());
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

    /**
     * @param int $position
     *
     * @return bool
     */
    private function isPositionFree(int $position)
    {
        return null === $this->map[$position];
    }
}
