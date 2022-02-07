<?php
    function ciudadesServidor() {
        require 'models/ciudades_model.php';
        $uri="http://localhost/DWES-UD7/ejercicio4Servidor";
        $server = new SoapServer(null,array('uri'=>$uri));
        $server->addFunction("getCiudades");
        $server->handle();
        
    }
?>