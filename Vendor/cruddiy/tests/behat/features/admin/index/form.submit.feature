Feature: The form should be pre-field

  Scenario: Look for config file variables

    And I press "Submit"
    Then I should not see "Access denied"