<?php

namespace spec\Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Model\Board;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Board::class);
    }

    function it_can_gets_and_sets_a_length()
    {
        $this->getLength()->shouldReturn(null);

        $this->setLength(20);

        $this->getLength()->shouldReturn(20);
    }
}
