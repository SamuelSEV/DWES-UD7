<?php

// Servicio Web - Servidor.

// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.128/DWES-UD7/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("suma");
$server->handle();

// Función para obtener una suma
function suma($num1, $num2) {
    return $num1 + $num2;
}

?>