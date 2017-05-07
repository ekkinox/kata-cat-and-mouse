Feature: Board
  In order to represent a board
  As a game player
  I need to be able to set the board length, to add animals on it

  Scenario: Setting and getting the board length
    Given there is no length set to the board
    When I set the length 20 to the board
    Then the board length should be 20

  Scenario: Adding a cat to the board at valid position
    Given there is no animals added to the board
    When I add a cat at position 2
    Then the board animal count should be 1
    And the board position 2 should be taken by a cat
    And the cat position should be 2
