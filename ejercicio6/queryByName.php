<?php

if (isset($_POST['enviar'])) {

    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

    //Basados en la estructura del servicio armamos un array
    $params = [
        "name" => $_POST['name']
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
    $result = $soap->QueryByName($params);

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>QueryByName - WSDL</title>
    </head>
<body>
    <h1>QueryByName</h1>
    <h2>Servicio WSDL</h2>
    <form action="queryByName.php" method="post">
    <?php
        print "<input type='text' name='name'> ";
        print "<input type='submit' name='enviar' value='Buscar'>";
    
    if (isset($_POST['enviar'])) {

        foreach($result->QueryByNameResult as $persona) {
            print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona . "</p><br>";
        }
        
    }
    ?>
    </form>
</body>
</html>