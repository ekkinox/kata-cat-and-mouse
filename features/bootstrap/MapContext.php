<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Ekkinox\KataCatAndMouse\Exception\AnimalOutOfBoundsException;
use Ekkinox\KataCatAndMouse\Exception\DuplicateAnimalException;
use Ekkinox\KataCatAndMouse\Model\AbstractAnimal;
use Ekkinox\KataCatAndMouse\Model\Cat;
use Ekkinox\KataCatAndMouse\Model\Map;
use Ekkinox\KataCatAndMouse\Model\Mouse;

/**
 * Defines application features from the specific context.
 */
class MapContext implements Context
{
    /**
     * @var Map
     */
    private $map;

    /**
     * @When I build a map of length :length
     */
    public function iBuildAMapOfLength($length)
    {
        $this->map = new Map($length);
    }

    /**
     * @Then the map length should be :length
     */
    public function theMapLengthShouldBe($length)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $length,
            $this->map->getLength()
        );
    }

    /**
     * @Then I should get a position error when I try to add the cat at position :position
     */
    public function iShouldGetAPositionErrorWhenITryToAddTheCatAtPosition($position)
    {
        try{
            $this->map->setCat($this->buildAnimal(Cat::class, $position));
        } catch (Exception $exception) {
            PHPUnit_Framework_Assert::assertEquals(
                AnimalOutOfBoundsException::class,
                get_class($exception)
            );
        }
    }

    /**
     * @When I add the cat at position :position
     */
    public function iAddTheCatAtPosition($position)
    {
        $this->map->setCat($this->buildAnimal(Cat::class, $position));
    }

    /**
     * @Then the map's cat position should be :position
     */
    public function theMapsCatPositionShouldBe($position)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $position,
            $this->map->getCat()->getPosition()
        );
    }

    /**
     * @Then I should get a cat duplicate error when I try to add another cat at position :position
     */
    public function iShouldGetACatDuplicateErrorWhenITryToAddAnotherCatAtPosition($position)
    {
        $exception = null;

        try{
            $this->map->setCat($this->buildAnimal(Cat::class, $position));
        } catch (Exception $exception) {
            PHPUnit_Framework_Assert::assertEquals(
                DuplicateAnimalException::class,
                get_class($exception)
            );
        }

        PHPUnit_Framework_Assert::assertNotNull($exception);
    }

    /**
     * @Then I should get a position error when I try to add the mouse at position :position
     */
    public function iShouldGetAPositionErrorWhenITryToAddTheMouseAtPosition($position)
    {
        try{
            $this->map->setMouse($this->buildAnimal(Mouse::class, $position));
        } catch (Exception $exception) {
            PHPUnit_Framework_Assert::assertEquals(
                AnimalOutOfBoundsException::class,
                get_class($exception)
            );
        }
    }

    /**
     * @When I add the mouse at position :position
     */
    public function iAddTheMouseAtPosition($position)
    {
        $this->map->setMouse($this->buildAnimal(Mouse::class, $position));
    }

    /**
     * @Then I should get a mouse duplicate mouse error when I try to add another mouse at position :position
     */
    public function iShouldGetAMouseDuplicateMouseErrorWhenITryToAddAnotherMouseAtPosition($position)
    {
        $exception = null;

        try{
            $this->map->setMouse($this->buildAnimal(Mouse::class, $position));
        } catch (Exception $exception) {
            PHPUnit_Framework_Assert::assertEquals(
                DuplicateAnimalException::class,
                get_class($exception)
            );
        }

        PHPUnit_Framework_Assert::assertNotNull($exception);
    }

    /**
     * @Then the map's mouse position should be :position
     */
    public function theMapsMousePositionShouldBe($position)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $position,
            $this->map->getMouse()->getPosition()
        );
    }

    /**
     * @param int $position
     *
     * @return Cat|Mouse|AbstractAnimal
     */
    private function buildAnimal(string $class, int $position)
    {
        /** @var AbstractAnimal $animal */
        $animal = new $class();
        $animal->setPosition($position);

        return $animal;
    }
}
