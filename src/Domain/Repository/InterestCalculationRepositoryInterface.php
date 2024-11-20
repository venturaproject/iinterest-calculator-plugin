<?php

declare(strict_types=1);

namespace InterestCalculatorPlugin\Domain\Repository;

use InterestCalculatorPlugin\Domain\InterestCalculator\Interest;

interface InterestCalculationRepositoryInterface
{
    public function save(Interest $interest): void;
}