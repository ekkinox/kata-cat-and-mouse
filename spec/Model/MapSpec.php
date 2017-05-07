<?php

namespace spec\Ekkinox\KataCatAndMouse\Model;

use Ekkinox\KataCatAndMouse\Exception\AnimalOutOfBoundsException;
use Ekkinox\KataCatAndMouse\Model\Cat;
use Ekkinox\KataCatAndMouse\Model\Map;
use Ekkinox\KataCatAndMouse\Model\Mouse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @package spec\Ekkinox\KataCatAndMouse\Model
 */
class MapSpec extends ObjectBehavior
{
    /**
     * @var int
     */
    private $length = 20;

    function let()
    {
        $this->beConstructedWith($this->length);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Map::class);
    }

    function it_is_build_with_a_length()
    {
        $this->getLength()->shouldReturn(20);
    }

    function it_cannot_set_the_cat_out_of_bounds()
    {
        $cat = new Cat();
        $cat->setPosition(30);

        $this->shouldThrow(AnimalOutOfBoundsException::class)->during('setCat', [$cat]);
    }

    function it_can_set_the_cat_and_retrieve_it()
    {
        $cat = new Cat();
        $cat->setPosition(10);

        $this->setCat($cat)->shouldReturn($this);

        $this->getCat()->shouldReturn($cat);
    }

    function it_cannot_set_the_mouse_out_of_bounds()
    {
        $mouse = new Mouse();
        $mouse->setPosition(30);

        $this->shouldThrow(AnimalOutOfBoundsException::class)->during('setMouse', [$mouse]);
    }

    function it_can_set_the_mouse_and_retrieve_it()
    {
        $mouse = new Mouse();
        $mouse->setPosition(10);

        $this->setMouse($mouse)->shouldReturn($this);

        $this->getMouse()->shouldReturn($mouse);
    }
}
