<?php

/* 
    Controlador
 */

require_once 'Cliente.php';

if(isset($_REQUEST["funcion"]) && $_REQUEST["funcion"] =="consultarProducto")
{
    $datos = array("codigo"=>$_REQUEST["codigo"]);
    $cliente = new Cliente($datos); 
    
    $cliente->consultarLibro(); 
    
}

