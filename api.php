<?php
/**
 * ==========================================================
 * API Endpoint - No2NOSOAP Project
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Description: This file serves as the API endpoint for the
 * No2NOSOAP project. It handles incoming requests and
 * interacts with the SOAP client to fetch product data.
 * ==========================================================
 */

require_once(__DIR__ . '/client/client.php');
require_once(__DIR__ . '/client/helper.php');

// Validate the 'op' parameter
if (!isset($_REQUEST['op'])) {
    sendErrorResponse('Operation name required.');
}

// Define allowed operations
$operation = $_REQUEST['op'];
$allowedOperations = ['getAll', 'getById'];

// Check if the operation is valid
if (!in_array($operation, $allowedOperations)) {
    sendErrorResponse('Invalid operation name.');
}

// Perform the operation
try {
    $client = new client();

    switch ($operation) {
        case 'getAll':
            $products = $client->getAll();
            if (empty($products)) {
                sendErrorResponse('No products found.');
            }
            sendSuccessResponse($products);
            break;

        case 'getById':
            // Validate the 'id' parameter
            if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
                sendErrorResponse('Valid product ID required.');
            }

            $product = $client->getById(['id' => $_REQUEST['id']]);
            if (!$product) {
                sendErrorResponse('Product not found.');
            }
            sendSuccessResponse($product);
            break;

        default:
            sendErrorResponse('Invalid operation.');
            break;
    }
} catch (Exception $e) {
    sendErrorResponse('An error occurred: ' . $e->getMessage());
}
