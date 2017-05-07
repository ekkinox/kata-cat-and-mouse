<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Ekkinox\KataCatAndMouse\Model\Board;

/**
 * Defines application features from the specific context.
 */
class BoardContext implements Context
{
    private $board;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->board = new Board();
    }

    /**
     * @Given there is no length set to the board
     */
    public function thereIsNoLengthSetToTheBoard()
    {
        PHPUnit_Framework_Assert::assertNull($this->board->getLength());
    }

    /**
     * @When I set the length :arg1 to the board
     */
    public function iSetTheLengthToTheBoard($length)
    {
        $this->board->setLength($length);
    }

    /**
     * @Then the board length should be :length
     */
    public function theBoardLengthShouldBe($length)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $length,
            $this->board->getLength()
        );
    }

    /**
     * @Given there is no animals added to the board
     */
    public function thereIsNoAnimalsAddedToTheBoard()
    {
        throw new PendingException();
    }

    /**
     * @When I add a cat at position :arg1
     */
    public function iAddACatAtPosition($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the board animal count should be :arg1
     */
    public function theBoardAnimalCountShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the board position :arg1 should be taken by a cat
     */
    public function theBoardPositionShouldBeTakenByACat($arg1)
    {
        throw new PendingException();
    }
}
