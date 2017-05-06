<?php

use Behat\Behat\Context\Context;
use Ekkinox\KataCatAndMouse\Model\Cat;

/**
 * Defines application features from the specific context.
 */
class CatContext implements Context
{
    /**
     * @var Cat
     */
    private $cat;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->cat = new Cat();
    }

    /**
     * @Given there is no position set to the cat
     */
    public function thereIsNoPositionSetToTheCat()
    {
        PHPUnit_Framework_Assert::assertNull($this->cat->getPosition());
    }

    /**
     * @When I set the position :position to the cat
     */
    public function iSetThePositionToTheCat($position)
    {
        $this->cat->setPosition($position);
    }

    /**
     * @Then the cat position should be :position
     */
    public function theCatPositionShouldBe($position)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $position,
            $this->cat->getPosition()
        );
    }
}
