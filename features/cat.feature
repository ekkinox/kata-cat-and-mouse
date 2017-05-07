Feature: Cat
  In order to represent a cat
  As a game player
  I need to be able to set the cat position on the board

  Scenario: Setting and getting the cat position
    Given there is no position set to the cat
    When I set the position 3 to the cat
    Then the cat position should be 3

  Scenario: Getting the cat drawing symbol
    Then the cat drawing symbol should be "C"