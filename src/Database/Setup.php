<?php

declare(strict_types=1);

namespace InterestCalculatorPlugin\Database;

class Setup
{
    /**
     * Create the database table for storing calculations.
     */
    public static function createTable(): void
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'compound_calculations';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            principal FLOAT NOT NULL,
            rate FLOAT NOT NULL,
            time INT NOT NULL,
            result FLOAT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}
