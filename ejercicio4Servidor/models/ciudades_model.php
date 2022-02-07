<?php
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