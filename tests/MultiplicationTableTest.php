<?php
namespace Tests;

require_once 'PHPUnit/Autoload.php';

use App\MultiplicationTable;
use PHPUnit\Framework\TestCase;

class MultiplicationTableTest extends TestCase {

    private $table;

    private $n = 10;

    private $primeNumbersArray = [2, 3, 5, 7,11, 13, 17, 19, 23, 29];

    private $showTableOutput = "  2   3   5   7  11  13  17  19  23  29".PHP_EOL.
                               "  3   9  15  21  33  39  51  57  69  87".PHP_EOL.
                               "  5  15  25  35  55  65  85  95 115 145".PHP_EOL.
                               "  7  21  35  49  77  91 119 133 161 203".PHP_EOL.
                               " 11  33  55  77 121 143 187 209 253 319".PHP_EOL.
                               " 13  39  65  91 143 169 221 247 299 377".PHP_EOL.
                               " 17  51  85 119 187 221 289 323 391 493".PHP_EOL.
                               " 19  57  95 133 209 247 323 361 437 551".PHP_EOL.
                               " 23  69 115 161 253 299 391 437 529 667".PHP_EOL.
                               " 29  87 145 203 319 377 493 551 667 841".PHP_EOL;


    private $data = null;

    function setUp() {
        $this->table = new MultiplicationTable();
    }

    function testCountDesiredPrimeNumbers()
    {

        $this->assertEquals($this->n, $this->table->n);
    }

    function testPrimeNumbersArray()
    {
        $this->assertEquals($this->primeNumbersArray, $this->table->getPrimeNumbers());
    }
    function testShowTable()
    {
        $this->data = file_get_contents(__DIR__ . "/../data.txt", "r");
        $this->assertEquals($this->showTableOutput, $this->data);
    }
}

