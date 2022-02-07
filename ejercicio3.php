<?php
    // Servicio Web - Servidor.

    // Instanciamos un nuevo servidor SOAP
    $uri="http://192.168.129.127/DWES-UD7/";
    $server = new SoapServer(null,array('uri'=>$uri));
    $server->addFunction("getCiudades");
    $server->handle();

    function getConnection() {
        $user = 'developer';
        $pwd = 'developer';
        return  new PDO('mysql:host=localhost;dbname=ciudades', $user, $pwd);
    }

    function getCiudades($poblacion) {
        try {
           
            $conn = getConnection();
            $consulta=$conn->prepare("SELECT * FROM ciudades WHERE poblacion >= ?");
            $consulta->bindParam(1, $poblacion);
            $consulta->execute();
            $ciudades = $consulta->fetchAll();
            $conn = null;

            return $ciudades;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
?>