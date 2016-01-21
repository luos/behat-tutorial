Feature: I have a bank account with a bank card where all my purchases show up sooner or later,
  I'd like to see a report each month where I spent my money and where I got money from

  Scenario: I haven't bought anything in the period
    When I run the report for "2016-01-01" to "2016-01-31"
    Then I should see a report with 0 lines


  Scenario: I bought one stuff from Sainsbury's
    Given I made a transaction on "2016-01-05" for "-100" from "Sainsbury's"
    When I run the report for "2016-01-01" to "2016-01-31"
    Then I should see a report with 1 lines
    And I should see "Sainsbury's" with sum of "-100"

  Scenario: I made a transactions to multiple entities
    Given I made a transactions:
      | name        | amount | date       |
      | Tesco       | -50    | 2016-01-10 |
      | Sainsbury's | -60    | 2016-01-25 |
      | My employer | 500    | 2016-01-15 |
    When I run the report for "2016-01-01" to "2016-01-31"
    Then The report should look like:
      | name        | sum |
      | Tesco       | -50 |
      | Sainsbury's | -60 |
      | My employer | 500 |