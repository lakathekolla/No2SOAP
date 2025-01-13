<?php
/**
 * ==========================================================
 * Helper Functions - No2NOSOAP Project
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Description: This file contains helper functions 
 * ==========================================================
 */

// Function to handle error responses
function sendErrorResponse($message) {
    http_response_code(400);
    echo json_encode(['error' => $message]);
}

// Function to handle successful responses
function sendSuccessResponse($data) {
    echo json_encode($data);
    exit;
}