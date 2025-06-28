<?php

namespace APP\Controllers;

use APP\Models\Login;

class LoginController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Login();
    }

    public function Mostrar()
    {

        if ($server = $_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = $_POST['usuario'] ?? '';
            $clave = $_POST['clave'] ?? '';

            $user = $this->instancia->Login($usuario, $clave);

            foreach ($user as $value) {

                if ($usuario == $value['usuario'] && $clave == $value['clave']) {

                    header('Location: /Banco-de-sangre/Inicio/Mostrar/');

                } elseif ($usuario == $value['usuario'] && $clave != $value['clave'] && !empty($clave) && !empty($usuario)) {

                    $mensaje = 'Contraseña incorrecta';
                    require_once __DIR__ . '/../Views/Login.php';

                } elseif ($usuario != $value['usuario'] && $clave == $value['clave'] && !empty($clave) && !empty($usuario)) {

                    $mensaje = 'Usuario incorrecto';
                    require_once __DIR__ . '/../Views/Login.php';

                } elseif ($usuario != $value['usuario'] && $clave != $value['clave'] && !empty($clave) && !empty($usuario)) {

                    $mensaje = 'Usuario y contraseña incorrectos';
                    require_once __DIR__ . '/../Views/Login.php';

                } elseif (empty($usuario) && !empty($clave)) {

                    $mensaje = 'El usuario esta vacio';
                    require_once __DIR__ . '/../Views/Login.php';

                } elseif (!empty($usuario) && empty($clave)) {

                    $mensaje = 'La contraseña esta vacia';
                    require_once __DIR__ . '/../Views/Login.php';

                } else {

                    $mensaje = 'Los campos estan vacios';
                    require_once __DIR__ . '/../Views/Login.php';

                }

            }
        } else {

            $mensaje = null;

            require_once __DIR__ . '/../Views/Login.php';
        }
    }
}
