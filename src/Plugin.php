<?php

declare(strict_types=1);

namespace InterestCalculatorPlugin;

use InterestCalculatorPlugin\API\Endpoints;
use InterestCalculatorPlugin\Database\Setup;
use InterestCalculatorPlugin\Infrastructure\Repository\InterestCalculationRepository;
use InterestCalculatorPlugin\Domain\Repository\InterestCalculationRepositoryInterface;

class Plugin
{
    private $interestCalculationRepository;

    public function __construct(InterestCalculationRepositoryInterface $interestCalculationRepository)
    {
        $this->interestCalculationRepository = $interestCalculationRepository;
    }

    /**
     * Inicializa los componentes del plugin
     */
    public function initialize(): void
    {
        // Registrar el endpoint REST
        $this->registerRestEndpoints();
    }

    /**
     * Register custom REST API endpoints.
     */
    public function registerRestEndpoints(): void
    {
        // Inyectar el repositorio en el endpoint
        $endpoint = new Endpoints($this->interestCalculationRepository);
        $endpoint->registerEndpoints();
    }

    /**
     * Crear la tabla en la base de datos al activar el plugin
     */
    public function createDatabaseTable(): void
    {
        Setup::createTable();
    }
}
