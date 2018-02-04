<?php
# features/bootstrap/FeaturesContext.php

use App\MultiplicationTable;
use Behat\Behat\Context\BehatContext,
Behat\Behat\Exception\PendingException;

use Behat\Gherkin\Node\PyStringNode,
Behat\Gherkin\Node\TableNode;

class FeatureContext extends BehatContext
{

    private $table;

    // prime numbers count
    private $n;

    private $primes;

    /**
     * @Given /^I have the number$/
     */
    public function iHaveTheNumber()
    {
        $n = $this->getTheNumber();
        $this->n = $n;
    }

    /**
     * @When /^I show table$/
     */
    public function iShowTable() {
        $this->table = new MultiplicationTable();
    }

    /**
     * @Then /^I should get the same number$/
     */
    public function iShouldGetTheSameNumber() {
        if ($this->table->n != $this->n) {
            throw new Exception("Actual number: ".$this->table->n);
        }

    }

    /**
     * @Get /^ the number $/
     */
    public function getTheNumber()
    {
        $n = 10;

        return $n;
    }

    /**
     * @Get /^ prime array $/
     */
    public function getPrimesArray()
    {
        $primes = [2, 3, 5, 7,11, 13, 17, 19, 23, 29];

        return $primes;
    }

    /**
     * @Given /^I have the array$/
     */
    public function iHaveTheArray()
    {
        $this->primes = $this->getPrimesArray();
    }

    /**
     * @Then /^I should get primes array$/
     */
    public function iShouldGetPrimesArray() {
        if ($this->table->primes != $this->primes) {
            throw new Exception("Actual primes: ".$this->table->primes);
        }

    }
}