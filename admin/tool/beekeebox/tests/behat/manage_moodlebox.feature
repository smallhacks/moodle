@tool @tool_beekeebox
Feature: Manage BeekeeBox settings
  In order to control BeekeeBox settings
  As an administrator
  I need to see the list of options
  
  @javascript
  Scenario: Display list of options
    # Check the report doesn't show when not enabled.
    Given I log in as "admin"
    Then I should see "BeekeeBox"
#     Then I should see "System information"
#     And I should see "Date and time setting"
#     And I should see "BeekeeBox password change"
#     And I should see "Wi-Fi network password change"
#     And I should see "Restart and shutdown"
