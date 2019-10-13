@popup
Feature: Displaying popups
  I want to display popups

  Background:
    Given the store operates on a single channel in "United States"

  @ui
  Scenario: Displaying page
    Given there is a popup in the store
    And this popup has "Sample Popup Title" title
    When I go to the homepage
    Then I should see the "Sample Popup Title" popup link in the header
