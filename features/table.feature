# features/table.feature
Feature: table
  In order to display a multiplication table of n prime numbers
  As anybody
  I need to provide the number of prime numbers

  Scenario: Display the multiplication table of n prime numbers
    Given I have the number
    When I show table
    Then I should get the same number

  Scenario: Display the multiplication table of n prime numbers
    Given I have the array
    When I show table
    Then I should get primes array