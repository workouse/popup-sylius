@popup
Feature: Adding new popup
  As an Administrator

  Background:
    Given the store operates on a single channel in "United States"
    And I am logged in as an administrator

  @ui
  Scenario: Adding popup
    When I go to the create popup
    And I fill the code with "popup_with_code"
    And I fill the title with "popup_with_title"
    And I fill the enabled with "true"
    And I try to add it
    Then I should be notified that the popup has been created

  @ui
  Scenario: Adding new popup with blank data
    When I go to the create popup
    And I add it
    And I should be notified that "Code" fields cannot be blank

  @ui
  Scenario: Deleting popup
    Given there is a popup in the store
    When I go to the popups page
    And I delete this popup

  @ui
  Scenario: Updating popup
    Given there is a popup in the store
    When I want to edit this popup
    And I fill "Title, Content" fields
    And I update it
    Then I should be notified that the popup was updated
