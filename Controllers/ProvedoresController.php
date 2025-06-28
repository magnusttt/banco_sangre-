<?php

namespace APP\Controllers;

use APP\Models\Provedores;

class ProvedoresController{

    private $instancia;

    public function __construct(){

        $this->instancia = new Provedores();

    }

    public function Mostrar(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $filtro = $_POST['filtro'] ?? '';
            $parametro = $_POST['parametro'] ?? '';
            $estado = $_POST['estado'] ?? '';

            if (isset($filtro) && !empty($filtro) && !empty($parametro) && !empty($estado)) {

                $provedores  = $this->instancia->busqueda($filtro, $parametro, $estado);

                require_once __DIR__ . "/../Views/Provedores.php";

            } elseif (empty($filtro) && $estado == 1) {

                $provedores  = $this->instancia->MostrarActivas();

                require_once __DIR__ . "/../Views/Provedores.php";

            } if (empty($filtro) && $estado == 2) {

                $provedores  = $this->instancia->MostrarInanctivas();

                require_once __DIR__ . "/../Views/Provedores.php";

            } else {

                require_once __DIR__ . "/../Views/Provedores.php";

            }
        } else {

        $estado = 1;

        $provedores = $this->instancia->MostrarActivas();

        require_once __DIR__ . "/../Views/Provedores.php";

        }
    }


    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $Rif = $_POST['rif'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $fecha = $_POST['fecha'] ?? '';

            $provedores = $this->instancia->Crear($Rif,$nombre,$direccion,$tipo,$telefono,$correo,$fecha);

            echo "Se guardo correctamente";

            header('location: /Banco-de-sangre/Provedores/Mostrar/');

        }


    }

    public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $provedores = $this->instancia->Editar($id);

            require_once __DIR__ . '/../Views/editar_provedor.php';

        } else {

            header('location: /Banco-de-sangre/Donante/Mostrar/');

        }

    }

    public function EditarProvedor(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $Rif = $_POST['rif'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $fecha = $_POST['fecha'] ?? '';

            $this->instancia->editarProvedor($id,$Rif,$nombre,$direccion,$tipo,$telefono,$correo,$fecha);

            header('location: /Banco-de-sangre/Provedores/Mostrar/');
            exit;

        } else {

            header('location: /Banco-de-sangre/Provedores/Editar/');
            exit;

        }

    }

    public function Eliminar(){

        // Verificar si el 'id' está presente en la URL y no está vacío

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = $_GET['id']; // Obtener el ID del donante desde la URL

            $this->instancia->eliminar($id);

            header('location: /Banco-de-sangre/Provedores/Mostrar/');
            exit;

        }

    }

    public function Activar(){

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = $_GET['id'];

            $this->instancia->activarProveedor($id);

            header('location: /Banco-de-sangre/Provedores/Mostrar/');
            exit;

        }
    }
}