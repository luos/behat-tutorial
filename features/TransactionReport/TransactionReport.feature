Feature: I have a bank account with a bank card where all my purchases show up sooner or later,
  I'd like to see a report each month where I spent my money and where I got money from

  Scenario: I haven't bought anything in the period
    Given I run the report for "2016-01-01" to "2016-01-31"
    Then I should see a report with 0 lines