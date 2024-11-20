<?php

declare(strict_types=1);

namespace InterestCalculatorPlugin\API;

use InterestCalculatorPlugin\Domain\InterestCalculator\Interest;
use InterestCalculatorPlugin\Domain\Repository\InterestCalculationRepositoryInterface;

class Endpoints
{
    private $interestCalculationRepository;

    public function __construct(InterestCalculationRepositoryInterface $interestCalculationRepository)
    {
        $this->interestCalculationRepository = $interestCalculationRepository;
        add_action('rest_api_init', [$this, 'registerEndpoints']);
    }

    /**
     * Register custom REST API endpoints.
     */
    public function registerEndpoints(): void
    {
        register_rest_route('money-calcs/v1', '/calculate', [
            'methods' => 'POST',
            'callback' => [$this, 'calculateInterest'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Endpoint to calculate compound interest.
     *
     * @param \WP_REST_Request $request Request object.
     * @return \WP_REST_Response Response object.
     */
    public function calculateInterest(\WP_REST_Request $request): \WP_REST_Response
    {
        $P = (float) $request->get_param('principal');
        $r = (float) $request->get_param('rate');
        $t = (int) $request->get_param('time');

        // Crear una instancia de la entidad Interest
        $interest = new Interest($P, $r, $t);

        // Guardar el cálculo en la base de datos usando el repositorio
        $this->interestCalculationRepository->save($interest);

        return new \WP_REST_Response([
            'principal' => $P,
            'rate' => $r,
            'time' => $t,
            'result' => $interest->getResult()
        ], 200);
    }
}
