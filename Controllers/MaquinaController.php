<?php

namespace APP\Controllers;

use APP\Models\Maquina;

class MaquinaController{

    private $instancia;

    public function __construct(){

        $this->instancia = new Maquina();

    }

    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $serial = $_POST['serial'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            $this->instancia->crear($serial,$nombre,$modelo,$descripcion);

            header('location: /Banco-de-sangre/Maquina/Mostrar/');
            exit;
        }
    }

    public function Mostrar()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $filtro = $_POST['filtro'] ?? '';
            $parametro = $_POST['parametro'] ?? '';
            $estado = $_POST['estado'] ?? '';

            if (isset($filtro) && !empty($filtro) && !empty($parametro) && !empty($estado)) {

                $maquinas  = $this->instancia->busqueda($filtro, $parametro, $estado);

                require_once __DIR__ . '/../Views/maquinas.php';

            } elseif (empty($filtro) && $estado == 1) {

                $maquinas  = $this->instancia->MostrarActivas();

                require_once __DIR__ . '/../Views/maquinas.php';

            } if (empty($filtro) && $estado == 2) {

                $maquinas  = $this->instancia->MostrarInanctivas();

                require_once __DIR__ . '/../Views/maquinas.php';

            } else {

                require_once __DIR__ . '/../Views/maquinas.php';

            }
        } else {

            $estado = 1;

            $maquinas = $this->instancia->MostrarActivas();

            require_once __DIR__ . "/../Views/maquinas.php";

        }
    }

    public function Activar(){

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = $_GET['id'];

            $this->instancia->activar($id);

            header('location: /Banco-de-sangre/Maquina/Mostrar/');
            exit;

        } else {

            header('location: /Banco-de-sangre/Maquina/Mostrar/');
            exit;

        }
    }

    public function editar(){

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = $_GET['id'];

            $maquinas = $this->instancia->editar($id);

            require_once __DIR__ . "/../Views/editar_maquina.php";

        }
    }

    public function eliminar(){

        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $id = $_GET['id'];

            $this->instancia->eliminar($id);

            header('location: /Banco-de-sangre/Maquina/Mostrar/');

        } else {

            echo "no se encontro nada";

        }
    }

    public function EditarMaquina(){

        if (isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $serial = $_POST['serial'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $modelo = $_POST['modelo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            $this->instancia->editarMaquina($id,$serial,$nombre,$modelo,$descripcion);

            header('location: /Banco-de-sangre/Maquina/Mostrar/');
            exit;

        } else {

            header('location: /Banco-de-sangre/Maquina/Mostrar/');
            exit;

        }
    }
}
