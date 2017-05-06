<?php

namespace spec\Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Model\Cat;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CatSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Cat::class);
    }

    function it_can_gets_and_sets_a_name()
    {
        $this->getPosition()->shouldReturn(null);

        $this->setPosition(2);

        $this->getPosition()->shouldReturn(2);
    }
}
