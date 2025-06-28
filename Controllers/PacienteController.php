<?php

namespace APP\Controllers;

use APP\Models\Paciente;

class PacienteController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Paciente();
    }

    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $fecha = $_POST['fecha_i'] ?? '';
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $cedula = $_POST['cedula'] ?? '';
            $p_nombre = $_POST['p_nombre'] ?? '';
            $s_nombre = $_POST['s_nombre'] ?? '';
            $p_apellido = $_POST['p_apellido'] ?? '';
            $s_apellido = $_POST['s_apellido'] ?? '';
            $fecha_n = $_POST['fecha_n'] ?? '';
            $Tipo_sangre = $_POST['Tipo_sangre'] ?? '';
            $Tipo_telefono = $_POST['Tipo_telefono'] ?? '';
            $tlf = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $Descripcion = $_POST['Descripcion'] ?? '';
            
            $this->instancia->crear($fecha,$nacionalidad,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$Tipo_sangre,$Tipo_telefono,$tlf,$direccion,$Descripcion);

            echo "Se guardo correctamente";

            header('location: /Banco-de-sangre/Paciente/Mostrar/');
        }

        require_once __DIR__ . "/../Views/agregar_Paciente.php";
    }

    public function Mostrar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $parametro = $_POST['parametro']?? '';
            $estado = $_POST['estado']?? '';

            if(!empty($parametro) && !empty($estado)){

                $paciente = $this->instancia->busqueda($parametro,$estado);

                $mensaje = 'No se ha encontrado ningun paciente';

                require_once __DIR__ . '/../Views/paciente.php';

            } elseif(empty($parametro) && $estado == 1) {

                $paciente = $this->instancia->mostrar();

                $mensaje = 'No se ha encontrado ningun paciente';
                
                require_once __DIR__ . '/../Views/paciente.php';

            } if(empty($parametro) && $estado == 2) {

                $mensaje = 'No se ha encontrado ningun paciente';

                $paciente = $this->instancia->mostrarinactivo();
                require_once __DIR__ . '/../Views/paciente.php';

            } else {

                $mensaje = 'No se ha encontrado ningun paciente';

                require_once __DIR__ . '/../Views/paciente.php';
                
            }
                

            } else {

                $estado = 1;

                $mensaje = 'No se ha encontrado ningun paciente';

                $paciente = $this->instancia->mostrar();

                require_once __DIR__ . '/../Views/paciente.php';

            }

        }
    
public function CambiarEstado()
    {
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['cambio']) && !empty($_GET['cambio'])) {
            $id = $_GET['id'];
            $cambio = $_GET['cambio']; 
            $this->instancia->cambiarEstado($id,$cambio);
            header('location: /Banco-de-sangre/Paciente/Mostrar/');

        } else {
            header('location: /Banco-de-sangre/Paciente/Mostrar/');
            exit;
        }
    }
    public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $pacientes = $this->instancia->mostrarEditar($id);

            require_once __DIR__ . '/../Views/editar_paciente.php';

        } else {

            header('location: /Banco-de-sangre/Paciente/Mostrar/');

        }
        
    }

    public function EditarPaciente(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $fecha = $_POST['fecha_i'] ?? '';
            $nacionalidad = $_POST['nacionalidad'] ?? '';
            $cedula = $_POST['cedula'] ?? '';
            $p_nombre = $_POST['p_nombre'] ?? '';
            $s_nombre = $_POST['s_nombre'] ?? '';
            $p_apellido = $_POST['p_apellido'] ?? '';
            $s_apellido = $_POST['s_apellido'] ?? '';
            $fecha_n = $_POST['fecha_n'] ?? '';
            $Tipo_sangre = $_POST['Tipo_sangre'] ?? '';
            $Tipo_telefono = $_POST['Tipo_telefono'] ?? '';
            $tlf = $_POST['telefono'] ?? '';
            $direccion = $_POST['direccion'] ?? '';
            $Descripcion = $_POST['Descripcion'] ?? '';

            $this->instancia->editar($id,$fecha,$nacionalidad,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$Tipo_sangre,$Tipo_telefono,$tlf,$direccion,$Descripcion);

            header('location: /Banco-de-sangre/Paciente/Mostrar/');
            exit;

        } else {
            header('location: /Banco-de-sangre/Mostrar/');
            exit;
        }

    }
}
