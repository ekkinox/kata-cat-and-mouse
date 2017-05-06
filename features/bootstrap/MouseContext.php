<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Ekkinox\KataCatAndMouse\Model\Mouse;

/**
 * Defines application features from the specific context.
 */
class MouseContext implements Context
{
    /**
     * @var Mouse
     */
    private $mouse;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->mouse = new Mouse();
    }

    /**
     * @Given there is no position set to the mouse
     */
    public function thereIsNoPositionSetToTheMouse()
    {
        PHPUnit_Framework_Assert::assertNull($this->mouse->getPosition());
    }

    /**
     * @When I set the position :position to the mouse
     */
    public function iSetThePositionToTheMouse($position)
    {
        $this->mouse->setPosition($position);
    }

    /**
     * @Then the mouse position should be :position
     */
    public function theMousePositionShouldBe($position)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $position,
            $this->mouse->getPosition()
        );
    }

    /**
     * @Then the mouse drawing symbol should be :symbol
     */
    public function theMouseDrawingSymbolShouldBe($symbol)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $symbol,
            $this->mouse->getDrawing()
        );
    }
}
