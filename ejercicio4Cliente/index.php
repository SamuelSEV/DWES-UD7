<?php
    //Incluir variables de configuracion y el unico controlador
    //require 'controller/libros_controller.php';

    //La carpeta donde buscaremos los controladores
    define ('CONTROLLERS_FOLDER', 'controllers/');

    //Si no se indica un controlador este sera el controlador que se usara.
    define ('DEFAULT_CONTROLLER', 'ciudades');

    //Si no se indica una accion, esta accion sera la que se usara

    define ('DEFAULT_ACTION', 'formulario');

    //Obtenemos el controlador
    $controller = DEFAULT_CONTROLLER;
    if (!empty($_GET['controller'])){
        $controller = $_GET['controller'];
    }

    $action = DEFAULT_ACTION;

    //obtenemos la accion seleccionada
    //Si el usuario no la introduce, seleccionamos la de por defecto.
    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }

    //Ya tenemeo el controlador y la accion
    //Formamos el nombre del fichero que contiene nuestro controlador

    $controller = CONTROLLERS_FOLDER . $controller . '_controller.php';

    //Si la variable $controller es un fichero lo requerimos

    try {
        if (is_file($controller)) {
            require_once($controller);
        }
        else {
            throw new Exception ('El controlador no existe - 404 not found');
        }
        //Si la variable $action es una funcion la ejecutamos o detenemos el script
        if (is_callable($action)) {
            $action();
        }
        else {
            throw new Exception ('La accion no existe - 404 not found');
        }
    } catch (Exception $e) {
        echo "Excepcion capturada: " . $e->getMessage(), "\n";
    }
?>