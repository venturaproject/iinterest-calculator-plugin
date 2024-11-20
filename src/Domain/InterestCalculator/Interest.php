<?php

declare(strict_types=1);

namespace InterestCalculatorPlugin\Domain\InterestCalculator;

class Interest
{
    private $principal;
    private $rate;
    private $time;
    private $result;

    public function __construct($principal = 0, $rate = 0, $time = 0)
    {
        $this->principal = $principal;
        $this->rate = $rate;
        $this->time = $time;
        $this->result = $this->calculateCompoundInterest();
    }

    public function calculateCompoundInterest(): float
    {
        return $this->principal * pow((1 + $this->rate), $this->time);
    }

    public function getPrincipal(): float
    {
        return $this->principal;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function getResult(): float
    {
        return $this->result;
    }
}

