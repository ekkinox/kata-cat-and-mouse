<?php

namespace Ekkinox\KataCatAndMouse\Model;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
interface DrawableInterface
{
    /**
     * @return null|string
     */
    public function getDrawing(): ?string;
}