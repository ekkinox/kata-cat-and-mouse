<?php

namespace Ekkinox\KataCatAndMouse\Model;

/**
 * @package Ekkinox\KataCatAndMouse\Model
 */
class Board
{
    /**
     * @var int
     */
    private $length;

    /**
     * @return int
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return Board
     */
    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }
}
