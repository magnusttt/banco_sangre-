<?php

    require_once __DIR__ . '/vendor/autoload.php'; // Aqui se requiere el archivo autoload

    $url = (isset($_GET['url']))?$_GET['url']:''; // Aqui se atrapa la URL

    $url = rtrim($url,'/');  // Aqui se elimina el ultimo ' / ' de la URL

    $partes = explode('/',$url); // Aqui se divide la URL por partes como un Array

    $controlador = !empty($partes[0])?$partes[0].'Controller':'LoginController'; // Aqui se almacena el controlador que esta en la URL

    $controladorClases = 'APP\\Controllers\\'.$controlador; // Aqui se guarda la ruta del controlador

    $metodo = !empty($partes[1])?$partes[1]:'Mostrar'; // Aqui se guarda el metodo de la URL

    $parametro = !empty($partes[2])?$partes[2]:''; // Aqui se atrapa el parametro de la URL

    if(class_exists($controladorClases)){ // Aqui se comprueba si el Controlador existe

        $controller = new $controladorClases(); // Aqui se crea la instancia o mejor dicho el objeto de la clase

        if(method_exists($controladorClases, $metodo)){ // Aqui se comprueba si la el metodo existe

            $controller->$metodo(); // Aqui se saca el metodo o funcion de la instancia creada de su respectiva clase

        } else {

            echo "El metodo no existe"; // Muesta un mensaje si ay un error en el metodo

        }

    } else {

        echo "El controlador no existe"; // Muesta un mensaje si ay un error en el controlador

    }