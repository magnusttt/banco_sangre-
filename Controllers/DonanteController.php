<?php

namespace APP\Controllers;

use APP\Models\Donante;

class DonanteController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Donante();
    }

    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $fecha = $_POST['fecha_i'] ?? '';
            $cedula = $_POST['cedula'] ?? '';
            $p_nombre = $_POST['p_nombre'] ?? '';
            $s_nombre = $_POST['s_nombre'] ?? '';
            $p_apellido = $_POST['p_apellido'] ?? '';
            $s_apellido = $_POST['s_apellido'] ?? '';
            $fecha_n = $_POST['fecha_n'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $tlf = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $tipo_telefono = $_POST['tipo_telefono'] ?? '';
            
            $this->instancia->crear($fecha,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$tipo,$tlf,$direccion,$nacionalidad,$tipo_telefono);

            echo "Se guardo correctamente";

            header('location: /Banco-de-sangre/Donante/Mostrar/');
        }

        require_once __DIR__ . "/../Views/agregar_donante.php";
    }

    public function Mostrar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $parametro = $_POST['parametro']?? '';
            $estado = $_POST['estado']?? '';

            if(!empty($parametro) && !empty($estado)){

                $donante = $this->instancia->busqueda($parametro,$estado);

                $mensaje = 'No se ha encontrado ningun donante';

                require_once __DIR__ . '/../Views/donante.php';

            } elseif(empty($parametro) && $estado == 1) {

                $donante = $this->instancia->mostrar();

                $mensaje = 'No se ha encontrado ningun donante';
                
                require_once __DIR__ . '/../Views/donante.php';

            } if(empty($parametro) && $estado == 2) {

                $mensaje = 'No se ha encontrado ningun donante';

                $donante = $this->instancia->mostrarinactivo();
                require_once __DIR__ . '/../Views/donante.php';

            } else {

                $mensaje = 'No se ha encontrado ningun donante';

                require_once __DIR__ . '/../Views/donante.php';
                
            }
                

            } else {

                $estado = 1;

                $mensaje = 'No se ha encontrado ningun donante';

                $donante = $this->instancia->mostrar();

                require_once __DIR__ . '/../Views/donante.php';

            }

        }
    


    public function eliminar()
    {
        // Verificar si el 'id' está presente en la URL y no está vacío
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id']; // Obtener el ID del donante desde la URL

            $this->instancia->eliminarDonante($id);

            header('location: /Banco-de-sangre/Donante/Mostrar/');
            exit;
        } else {
            header('location: /Banco-de-sangre/Donante/Mostrar/');
            exit;
        }
    }

    public function Activar()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];

            $this->instancia->activarDonante($id);

            header('location: /Banco-de-sangre/Donante/Mostrar/');
            exit;   
        }  else {
            header('location: /Banco-de-sangre/Donante/Mostrar/');
            exit;
        }
    }

    public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $donantes = $this->instancia->mostrarEditar($id);

            require_once __DIR__ . '/../Views/editar_donante.php';

        } else {

            header('location: /Banco-de-sangre/Donante/Mostrar/');

        }
        
    }

    public function EditarDonante(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $fecha = $_POST['fecha_i'] ?? '';
            $cedula = $_POST['cedula'] ?? '';
            $p_nombre = $_POST['p_nombre'] ?? '';
            $s_nombre = $_POST['s_nombre'] ?? '';
            $p_apellido = $_POST['p_apellido'] ?? '';
            $s_apellido = $_POST['s_apellido'] ?? '';
            $fecha_n = $_POST['fecha_n'] ?? '';
            $tipo = $_POST['tipo'] ?? '';
            $tlf = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $tipo_telefono = $_POST['tipo_telefono'] ?? '';

            $this->instancia->editar($id,$fecha,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$tipo,$tlf,$direccion,$nacionalidad,$tipo_telefono);

            header('location: /Banco-de-sangre/Donante/Mostrar/');
            exit;

        } else {
            header('location: /Banco-de-sangre/Mostrar/');
            exit;
        }

    }
}
