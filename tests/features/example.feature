Feature: Hover test

  @javascript
  Scenario: I can hover over something to reveal a word
    Given I am on "test.htm"
    And I hover over the element ".hoverme"
    Then I should see "Hello World"
