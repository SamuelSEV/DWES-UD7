<?php

if (isset($_POST['enviar'])) {

    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

    //Basados en la estructura del servicio armamos un array
    $params = [
        "Arg1" => (int)$_POST['Arg1'],
        "Arg2" => (int)$_POST['Arg2']
    ];

    $options = [
        "uri"=> $wsdl,
        "style"=> SOAP_RPC,
        "use"=> SOAP_ENCODED,
        "soap_version"=> SOAP_1_1,
        "cache_wsdl"=> WSDL_CACHE_BOTH,
        "connection_timeout" => 15,
        "trace" => false,
        "encoding" => "UTF-8",
        "exceptions" => false,
    ];

    //Enviamos el Request
    $soap = new SoapClient($wsdl, $options);
    $result = $soap->DivideInteger($params);

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>División - WSDL</title>
    </head>
<body>
    <h1>Obtener División</h1>
    <h2>Servicio WSDL</h2>
    <form action="divideInteger.php" method="post">
    <?php
        print "<input type='number' name='Arg1'> / ";
        print "<input type='number' name='Arg2'> ";
        print "<input type='submit' name='enviar' value='Dividir'>";
    
    if (isset($_POST['enviar'])) {
        print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $result->DivideIntegerResult . "</p>";
    }
    ?>
    </form>
</body>
</html>