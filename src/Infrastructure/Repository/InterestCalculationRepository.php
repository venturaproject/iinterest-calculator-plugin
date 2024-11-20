<?php


namespace InterestCalculatorPlugin\Infrastructure\Repository;

use InterestCalculatorPlugin\Domain\Repository\InterestCalculationRepositoryInterface;
use InterestCalculatorPlugin\Domain\InterestCalculator\Interest;

class InterestCalculationRepository implements InterestCalculationRepositoryInterface
{
    /**
     * Save the interest calculation to the database.
     *
     * @param Interest $interest
     * @return void
     */
    public function save(Interest $interest): void
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'compound_calculations';

        // Guardar los datos en la base de datos
        $wpdb->insert($table_name, [
            'principal' => $interest->getPrincipal(),
            'rate' => $interest->getRate(),
            'time' => $interest->getTime(),
            'result' => $interest->getResult()
        ]);
    }
}


