<?php
// Vaciamos algunas variables
$error = "";
$resultado = "";
$num = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.128/DWES-UD7/ejercicio2.php";
$uri = "http://192.168.129.128/DWES-UD7/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
// Ejecutamos las siguientes líneas al enviar el formulario.
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (is_int((int)$_POST['num'])) {
        $num = (int)$_POST['num'];
        $resultado = "El número es: " . $cliente->devuelveParidad($num);
    } else {
        $error = "<strong>Error:</strong> Debes introducir números enteros.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Calcular Si es par o impar - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Obtener Si es par o impar</h1>
    <h2>Servicio Web + PHP + SOAP</h2>
    <form action="ejercicio2Cliente.php" method="POST">
    <?php
        print "<input type='number' name='num' value='$num'>";
        print "<input type='submit' name='enviar' value='Comprobar'>";
        print "<p class='error'>$error</p>";
        print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>$resultado</p>";
    ?>
    </form>
</body>
</html>