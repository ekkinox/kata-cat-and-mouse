<?php

namespace Ekkinox\KataCatAndMouse\Exception;

use Ekkinox\KataCatAndMouse\Model\AbstractAnimal;
use Ekkinox\KataCatAndMouse\Model\Map;
use DomainException;
use Exception;

/**
 * @package Ekkinox\KataCatAndMouse\Exception
 */
class AnimalOutOfBoundsException extends DomainException
{
    /**
     * @param Map            $map
     * @param AbstractAnimal $animal
     * @param Exception|null $previous
     */
    public function __construct(Map $map, AbstractAnimal $animal, Exception $previous = null)
    {
        $message = sprintf(
            "Animal position '%s' is out of map length limit '%s'",
                $animal->getPosition(),
                $map->getLength()
        );

        parent::__construct($message, 0, $previous);
    }
}
