<?php

/*
 Cliente que permite traer los datos del web service
 */

/**
 * Description of Cliente
 *
 * @author Oscar Diaz
 */

require_once ('./nusoap/lib/nusoap.php');

class Cliente {
    //put your code here
    
    private $client;
    private $datos; 
    
    function __construct($datos) {
        $proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
        $proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
        $proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
        $proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
        
        $this ->client = new nusoap_client("http://localhost:8080/servicioGesBod/ServicioGesbod?WSDL", 'wsdl',
                            $proxyhost, $proxyport, $proxyusername, $proxypassword);
        
        $error = $this->client->getError();
        
        if($error){
            echo "<pre>Consulta cliente con errores ".$error."</pre>";
            
        }
        
        $this->datos = $datos;
    }
    
    public function consultarLibro()
    {
       $codigo_producto = $this->datos["codigo"];
       $parametro = array('codigoProducto' => $codigo_producto); 
       $resultado = $this->client->call('getProducto', array('parameters' => $parametro)); 
       echo json_encode($resultado);
       
       
       
    }

}
