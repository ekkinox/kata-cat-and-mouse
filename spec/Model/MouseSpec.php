<?php

namespace spec\Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Model\Mouse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @package spec\Ekkinox\KataCatAndMouse\Model
 */
class MouseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Mouse::class);
    }

    function it_can_gets_and_sets_a_name()
    {
        $this->getPosition()->shouldReturn(null);

        $this->setPosition(2);

        $this->getPosition()->shouldReturn(2);
    }

    function it_has_a_specific_drawing_symbol()
    {
        $this->getDrawing()->shouldReturn('m');
    }
}
