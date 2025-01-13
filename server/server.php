<?php
require_once(__DIR__ .'/config.php');
require_once(__DIR__ . '/framework/Server.php');

/**
 * ==========================================================
 * SOAP Server - No2NOSOAP Project
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Description: This file serves as the SOAP server for the
 * No2NOSOAP project. It handles incoming SOAP requests and
 * interacts with the database to fetch product data.
 * ==========================================================
 */

$soapServer = new SoapServer(null, $_NOSOAP_PARAMS);
$soapServer->setClass('server');
$soapServer->handle(); 