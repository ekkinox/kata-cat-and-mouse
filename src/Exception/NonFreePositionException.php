<?php

namespace Ekkinox\KataCatAndMouse\Exception;

use RuntimeException;
use Exception;

/**
 * @package Ekkinox\KataCatAndMouse\Exception
 */
class NonFreePositionException extends RuntimeException
{
    /**
     * @param int            $position
     * @param Exception|null $previous
     */
    public function __construct(int $position, Exception $previous = null)
    {
        $message = sprintf("Position '%s' is already taken on the map", $position);

        parent::__construct($message, 0, $previous);
    }
}
