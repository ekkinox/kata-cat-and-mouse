<?php

namespace Ekkinox\KataCatAndMouse\Exception;

use Ekkinox\KataCatAndMouse\Model\AbstractAnimal;
use RuntimeException;
use Exception;

/**
 * @package Ekkinox\KataCatAndMouse\Exception
 */
class DuplicateAnimalException extends RuntimeException
{
    /**
     * @param AbstractAnimal $animal
     * @param Exception|null $previous
     */
    public function __construct(AbstractAnimal $animal, Exception $previous = null)
    {
        $message = sprintf("There is already an animal of type '%s' on the map", get_class($animal));

        parent::__construct($message, 0, $previous);
    }
}
