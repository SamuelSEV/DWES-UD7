<?php
    function formulario() {
        
        $error = "";
        $resultado = [];
        $poblacion = "";

        if (isset($_POST['enviar'])) {
            $url = "http://localhost/DWES-UD7/ejercicio4Servidor/index.php?controller=ciudades&action=ciudadesServidor";
            $uri = "http://localhost/DWES-UD7/";
            $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
            if (is_int((int)$_POST['poblacion']) && is_int((int)$_POST['poblacion']) > 0) {
                $poblacion = (int)$_POST['poblacion'];
            
                
                $resultado = $cliente->getCiudades($poblacion);
            } else {
                $error = "<strong>Error:</strong> Debes introducir un numerom mayor a 0.";
            }
        }
        include 'views/formulario_view.php';
    }
?>