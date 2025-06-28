<?php 

namespace APP\Controllers;
use APP\Models\Personal;

class PersonalController {

    private $instancia;

    public function __construct(){

        $this->instancia = new Personal();

    }

    public function Mostrar(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $filtro = $_POST['filtro'] ?? '';
            $parametro = $_POST['parametro'] ?? '';
            $estado = $_POST['estado'] ?? '';

            if (isset($filtro) && !empty($filtro) && !empty($parametro) && !empty($estado)) {

                $personal  = $this->instancia->busqueda($filtro, $parametro, $estado);

                require_once __DIR__ . "/../Views/Personal.php";

            } elseif (empty($filtro) && $estado == 1) {

                $personal  = $this->instancia->MostrarActivas();

                require_once __DIR__ . "/../Views/Personal.php";

            } if (empty($filtro) && $estado == 2) {

                $personal  = $this->instancia->MostrarInanctivas();

                require_once __DIR__ . "/../Views/Personal.php";

            } else {

                require_once __DIR__ . "/../Views/Personal.php";

            }
        } else {

        $estado = 1;

        $personal= $this->instancia->MostrarActivas();

        require_once __DIR__ . "/../Views/Personal.php";

        }
    }

    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $doc = $_POST['doc'] ?? '';
            $nombre_pri = $_POST['nom_1'] ?? '';
            $nombre_seg = $_POST['nom_2'] ?? '';
            $apellido_pri = $_POST['ape_1'] ?? '';
            $apellido_seg = $_POST['ape_2'] ?? '';
            $fecha_nac = $_POST['fecha_nac'] ?? '';
            $tipo_telefono = $_POST['tipo_telefono'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $cargo = $_POST['cargo'] ?? '';
            $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';

            $personal = $this->instancia->Crear($nacionalidad, $doc, $nombre_pri, $nombre_seg, $apellido_pri, $apellido_seg, $fecha_nac, $tipo_telefono, $telefono, $direccion, $cargo, $fecha_ingreso);
            
            echo "Personal creado exitosamente";

            header("Location: /Banco-de-sangre/Personal/Mostrar");
        }

    }
    public function eliminar()
    {
        // Verificar si el 'id' está presente en la URL y no está vacío
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id']; // Obtener el ID del donante desde la URL

            $this->instancia->eliminarPersonal($id);

            header('location: /Banco-de-sangre/Personal/Mostrar/');
            exit;
        } else {
            header('location: /Banco-de-sangre/Personal/Mostrar/');
            exit;
        }
    }

    public function Activar()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];

            $this->instancia->activarPersonal($id);

            header('location: /Banco-de-sangre/Personal/Mostrar/');
            exit;   
        }  else {
            header('location: /Banco-de-sangre/Personal/Mostrar/');
            exit;
        }
    }
    public function EditaPersonal(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $doc = $_POST['doc'] ?? '';
            $nombre_pri = $_POST['nom_1'] ?? '';
            $nombre_seg = $_POST['nom_2'] ?? '';
            $apellido_pri = $_POST['ape_1'] ?? '';
            $apellido_seg = $_POST['ape_2'] ?? '';
            $fecha_nac = $_POST['fecha_nac'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $cargo = $_POST['cargo'] ?? '';
            $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';

            $this->instancia->editarPersonal($id, $nacionalidad, $doc, $nombre_pri, $nombre_seg, $apellido_pri, $apellido_seg, $fecha_nac, $telefono, $correo, $direccion, $cargo, $fecha_ingreso);
            
            header("Location: /Banco-de-sangre/Personal/Mostrar");
            exit;

        } else {

            header("Location: /Banco-de-sangre/Personal/Mostrar");
            exit;

        }

    }

    public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $personal = $this->instancia->Editar($id);

            require_once __DIR__ . '/../Views/editar_Personal.php';

        } else {

            header('location: /Banco-de-sangre/Personal/Mostrar/');

        }

    }
    public function EditarPersonal(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $doc = $_POST['doc'] ?? '';
            $nombre_pri = $_POST['primer_nombre'] ?? '';
            $nombre_seg = $_POST['segundo_nombre'] ?? '';
            $apellido_pri = $_POST['primer_apellido'] ?? '';
            $apellido_seg = $_POST['segundo_apellido'] ?? '';
            $fecha_nac = $_POST['fecha_nac'] ?? '';
            $tipo_telefono = $_POST['tipo_telefono'] ?? '';
            $telefono = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $cargo = $_POST['cargo'] ?? '';
            $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';

            $this->instancia->editarPersonal($id, $nacionalidad, $doc, $nombre_pri, $nombre_seg, $apellido_pri, $apellido_seg, $fecha_nac, $tipo_telefono, $telefono, $direccion, $cargo, $fecha_ingreso);

            header('location: /Banco-de-sangre/Personal/Mostrar/');
            exit;

        } else {
            header('location: /Banco-de-sangre/Mostrar/');
            exit;
        }

    }


}