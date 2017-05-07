<?php

namespace Ekkinox\KataCatAndMouse\Factory;

use Ekkinox\KataCatAndMouse\Model\Map;

/**
 * @package Ekkinox\KataCatAndMouse\Factory
 */
class MapFactory
{
    /**
     * @param int $length
     *
     * @return Map
     */
    public function create(int $length): Map
    {
        return new Map($length);
    }
}
