<?php
// Vaciamos algunas variables
$error = "";
$resultado = [];
$poblacion = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.127/DWES-UD7/ejercicio3.php";
$uri = "http://192.168.129.127/DWES-UD7/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
// Ejecutamos las siguientes líneas al enviar el formulario.
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (is_int((int)$_POST['poblacion']) && is_int((int)$_POST['poblacion']) > 0) {
        $poblacion = (int)$_POST['poblacion'];
       
        // Si los parámetros son correctos, llamamos a la función getCiudades de ejercicio3.php
        $resultado = $cliente->getCiudades($poblacion);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un numerom mayor a 0.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ciudades - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Ciudades</h1>
    
    <form action="ejercicio3Cliente.php" method="POST">
    <?php
        print "<input type='number' name='poblacion' value='$poblacion'>";
        print "<input type='submit' name='enviar' value='Comprobar'>";
        print "<p class='error'>$error</p>";
     
        foreach($resultado as $ciudad) {
            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $ciudad['nombre'] . " " . $ciudad['poblacion'] . "</p>";
        }
    ?>
    </form>
</body>
</html>