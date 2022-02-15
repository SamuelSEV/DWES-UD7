<?php

if (isset($_POST['enviar'])) {

    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

    //Basados en la estructura del servicio armamos un array

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
    $result = $soap->Mission();

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mission - WSDL</title>
    </head>
<body>
    <h1>Obtener Mission</h1>
    <h2>Servicio WSDL</h2>
    <form action="mission.php" method="post">
    <?php
        print "<input type='submit' name='enviar' value='Obtener mision'>";
    
    if (isset($_POST['enviar'])) {
        print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $result->MissionResult . "</p>";
    }
    ?>
    </form>
</body>
</html>
© 2022 GitHub, Inc.
Terms
Pri