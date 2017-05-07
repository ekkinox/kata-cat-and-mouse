Feature: Mouse
  In order to represent a mouse
  As a game player
  I need to be able to set the mouse position on the map

  Scenario: Setting and getting the mouse position
    Given there is no position set to the mouse
    When I set the position 3 to the mouse
    Then the mouse position should be 3

  Scenario: Getting the mouse drawing symbol
    Then the mouse drawing symbol should be "m"