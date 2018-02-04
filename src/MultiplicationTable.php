<?php
namespace App;

class MultiplicationTable
{

    public $n;
    public $primes;

    public function __construct()
    {
        $options = getopt("n:hp:");
        $this->n = ($options && $options['n']) ? $options['n'] : 10;

        $this->showTable();

    }

    /**
     * Display the multiplication table
     */
    public function showTable()
    {
        $this->primes = $this->getPrimeNumbers();

        if ($this->primes && count($this->primes) > 0) {
            $max_number = max($this->primes);
            $max_multi  = $max_number * $max_number;
            $max_length = strlen((string)$max_multi);
            $STDOUT = fopen(__DIR__ . "/../data.txt", "w");

            foreach ($this->primes as $key => $val) {
                foreach ($this->primes as $k => $v) {
                    if ($k == 0) {
                        echo str_pad($val, $max_length, " ", STR_PAD_LEFT);
                        fwrite($STDOUT, str_pad($val, $max_length, " ", STR_PAD_LEFT));
                    } elseif ($key == 0) {
                        echo str_pad($v, $max_length + 1, " ", STR_PAD_LEFT);
                        fwrite($STDOUT, str_pad($v, $max_length + 1, " ", STR_PAD_LEFT));
                    }
                    if ($k != 0 && $key != 0) {
                        echo str_pad($val * $v, $max_length + 1, " ", STR_PAD_LEFT);
                        fwrite($STDOUT, str_pad($val * $v, $max_length + 1, " ", STR_PAD_LEFT));
                    }
                }
                echo PHP_EOL;
                fwrite($STDOUT, PHP_EOL);
            }
            fclose($STDOUT);
        }
    }


    /**
     * Returns the array of prime numbers
     * @return array
     */
    public function getPrimeNumbers()
    {

        $primes = [];
        $count  = 0;
        $number = 2;

        while ($count < $this->n) {
            $number_count = 0;

            for ($i = 1; $i <= $number; $i++) {

                if ($number !== $i && $i !== 1 && ($number % $i) === 0) {
                    $number_count++;
                }
            }
            // the number is prime
            if ($number_count < 1) {
                array_push($primes, $number);
                $count++;
            }
            $number++;
        }

        return $primes;

    }
}

new MultiplicationTable();
