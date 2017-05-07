<?php

namespace Ekkinox\KataCatAndMouse;

use Ekkinox\KataCatAndMouse\Factory\AnimalFactory;
use Ekkinox\KataCatAndMouse\Factory\MapFactory;
use Ekkinox\KataCatAndMouse\Model\Cat;
use Ekkinox\KataCatAndMouse\Model\Mouse;

/**
 * @package Ekkinox\KataCatAndMouse
 */
class Game
{
    /** Move directions */
    const MOVE_TOP    = 'top';
    const MOVE_RIGHT  = 'right';
    const MOVE_BOTTOM = 'bottom';
    const MOVE_LEFT   = 'left';

    /**
     * @var MapFactory
     */
    private $mapFactory;
    /**
     * @var AnimalFactory
     */
    private $animalFactory;

    /**
     * @param MapFactory    $mapFactory
     * @param AnimalFactory $animalFactory
     */
    public function __construct(MapFactory $mapFactory, AnimalFactory $animalFactory)
    {
        $this->mapFactory    = $mapFactory;
        $this->animalFactory = $animalFactory;
    }

    /**
     * @param int $mapLength
     * @param int $steps
     * @param int $catPosition
     * @param int $mousePosition
     *
     * @return string
     */
    public function play(int $mapLength, int $steps, int $catPosition, int $mousePosition): string
    {
        $map = $this->mapFactory->create($mapLength);

        $map->setCat($this->animalFactory->create(Cat::class, $catPosition));
        $map->setMouse($this->animalFactory->create(Mouse::class, $mousePosition));

        $currentPosition = $catPosition;
        $currentSteps    = 0;

        return $map->getDrawing();
    }

}
