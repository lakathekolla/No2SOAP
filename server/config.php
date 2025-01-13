<?php
/**
 * ==========================================================
 * No2NOSOAP Configuration 1v0
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Date: 2025-01-13
 * Description: Create `no_nosoap` database and tables by
 * executing the SQL commands from the `nosoap.sql` file.
 * ==========================================================
*/

// Database configuration file
define("DB_HOST", getenv('DB_HOST') ?: "localhost");
define("DB_NAME", getenv('DB_NAME') ?: "no_nosoap");
define("DB_PORT", getenv('DB_PORT') ?: "3306");
define("DB_USER", getenv('DB_USER') ?: "root");
define("DB_PASSWORD", getenv('DB_PASSWORD') ?: "");
define("TABLE", "products");

$_NOSOAP_PARAMS = array(
    'uri' => getenv('SOAP_SERVER_URI') ?: "http://localhost/1v0/soaptest/server/server.php"
);