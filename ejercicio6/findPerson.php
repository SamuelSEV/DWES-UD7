<?php

if (isset($_POST['enviar'])) {

    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

    //Basados en la estructura del servicio armamos un array
    $params = [
        "id" => $_POST['id']
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
    $result = $soap->FindPerson($params);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Obtener Persona</title>
    </head>
<body>
    <h1>Obtener Persona por id</h1>
    <h2>Servicio WSDL</h2>
    <form action="findPerson.php" method="post">
    <?php
        print "<input type='number' name='id'> ";
        print "<input type='submit' name='enviar' value='Buscar'>";
    
        if (isset($_POST['enviar'])) {
            foreach($result as $persona) {
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Name . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Age . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->SSN . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->DOB . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Home->Street . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Home->City . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Home->State . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Home->Zip . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Office->Street . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Office->City . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Office->State . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->Office->Zip . "</p>";
                print "<p style='font-size: 12pt;font-weight: bold;color: green;'>" . $persona->FavoriteColors->FavoriteColorsItem . "</p>";
            }
        }
    ?>
    </form>
</body>
</html>