Feature: Map
  In order to represent a map
  As a game player
  I need to be able to set the map length, to add animals on it

  Background:
    Given I build a map of length 20

  Scenario: Checking the map length
    Then the map length should be 20

  Scenario: Adding the cat to the map at an invalid position
    Then I should get a position error when I try to add the cat at position 30

  Scenario: Adding more than one cat to the board
    When I add the cat at position 10
    Then I should get a cat duplicate error when I try to add another cat at position 11

  Scenario: Adding the cat to the map at an valid position
    When I add the cat at position 10
    Then the map's cat position should be 10

  Scenario: Adding the mouse to the map at an invalid position
    Then I should get a position error when I try to add the mouse at position 30

  Scenario: Adding more than one mouse to the board
    When I add the mouse at position 10
    Then I should get a mouse duplicate error when I try to add another mouse at position 11

  Scenario: Adding the mouse to the map at an valid position
    When I add the mouse at position 10
    Then the map's mouse position should be 10

  Scenario: Adding the cat and the mouse at the same position
    When I add the cat at position 10
    Then I should get a non free position error when I try to add the mouse at position 10

