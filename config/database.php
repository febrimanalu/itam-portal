<?php
/**
 * Database configuration for the ITAM Portal.
 *
 * Update these values for your environment or map them from environment
 * variables in production deployments.
 */
return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'port' => getenv('DB_PORT') ?: '3306',
    'database' => getenv('DB_DATABASE') ?: 'itam_portal',
    'username' => getenv('DB_USERNAME') ?: 'itam_user',
    'password' => getenv('DB_PASSWORD') ?: 'change_me',
    'charset' => 'utf8mb4',
];
