<?php
/**
 * Plugin Name: Interest Calculator
 * Description: A plugin for calculating interest rates.
 * Version: 1.0
 * Author: AV
 * Author URI: https://github.com/venturaproject
 * License: GPL2
 */

namespace InterestCalculatorPlugin;

use InterestCalculatorPlugin\Plugin;
use InterestCalculatorPlugin\Database\Setup;
use InterestCalculatorPlugin\Infrastructure\Repository\InterestCalculationRepository;
use InterestCalculatorPlugin\Domain\Repository\InterestCalculationRepositoryInterface;
use Pimple\Container;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Autoload dependencies
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Función para registrar los servicios del plugin.
 */
function register_interest_calculator_services() {
    $container = new Container();

    // Registrar el repositorio de cálculos de interés
    $container[InterestCalculationRepositoryInterface::class] = function ($c) {
        return new InterestCalculationRepository(); // Asegúrate de que InterestCalculationRepository esté correctamente definida e importada
    };

    // Registrar el endpoint
    $container[Endpoints::class] = function ($c) {
        return new Endpoints($c[InterestCalculationRepositoryInterface::class]);
    };

    // Registrar el Plugin
    $container[Plugin::class] = function ($c) {
        // Pasamos la instancia correcta del repositorio
        return new Plugin($c[InterestCalculationRepositoryInterface::class]);
    };

    // Instanciar el plugin
    $plugin = $container[Plugin::class];
    $plugin->initialize();
}

/**
 * Registrar los hooks de activación y los endpoints en WordPress.
 */
function register_hooks() {
    // Hook para la activación del plugin
    register_activation_hook(__FILE__, [Setup::class, 'createTable']);

    // Registrar la acción de inicialización de REST API
    add_action('rest_api_init', function () {
        register_interest_calculator_services();
    });
}

/**
 * Inicializar el plugin y registrar el hook de activación
 */
function run_plugin() {
    // Registrar los hooks necesarios
    register_hooks();
}

// Run the plugin
run_plugin();
