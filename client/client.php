<?php
/**
 * Client Class - No2NOSOAP Project
 * ==========================================================
 * This class acts as a SOAP client that communicates with the SOAP server
 * ==========================================================
 */
class client
{
    
    private $soap_instance;

    public function __construct()
    {
        $params = array(
            'location' => getenv('SOAP_SERVER_URI') ?: "http://localhost/1v0/soaptest/server/server.php",
            'uri' => getenv('SOAP_SERVER_URN') ?: "urn://localhost/1v0/soaptest/server/server.php",
            'trace' => 1
        );
        $this->soap_instance = new SoapClient(null, $params);
    }

    public function getAll(){ 
        try {
            return $this->soap_instance->getAllProducts();
        } catch (Exception $ex) {
            exit("soap error: " . $ex->getMessage());
        }
    }

    public function getById($params){
        try {
            return $this->soap_instance->getProduct($params);
        } catch (Exception $ex) {
            exit("soap error: " . $ex->getMessage());
        }
    }
}
