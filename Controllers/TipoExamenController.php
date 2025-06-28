<?php

namespace APP\Controllers;

use APP\Models\TipoExamen;

class TipoExamenController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new TipoExamen();
    }

    public function Crear(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $Nombre = $_POST['Nombre'] ?? '';
            $Descripcion = $_POST['Descripcion'] ?? '';
            $Categoria = $_POST['Categoria'] ?? '';
            
            $this->instancia->crear($Nombre,$Descripcion,$Categoria);

            echo "Se guardo correctamente";

            header('location: /Banco-de-sangre/TipoExamen/Mostrar/');
        }

        require_once __DIR__ . "/../Views/agregar_TipoExamen.php";
    }

    public function Mostrar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $parametro = $_POST['parametro']?? '';
            $estado = $_POST['estado']?? '';

            if(!empty($parametro) && !empty($estado)){

                $tipoexamen = $this->instancia->busqueda($parametro,$estado);

                $mensaje = 'No se ha encontrado ningun Tipo de Examen';

                require_once __DIR__ . '/../Views/TipoExamen.php';

            } elseif(empty($parametro) && $estado == 1) {

                $tipoexamen = $this->instancia->mostrar();

                $mensaje = 'No se ha encontrado ningun Tipo de Examen';
                
                require_once __DIR__ . '/../Views/TipoExamen.php';

            } if(empty($parametro) && $estado == 2) {

                $mensaje = 'No se ha encontrado ningun Tipo de Examen';

                $tipoexamen = $this->instancia->mostrarinactivo();
                require_once __DIR__ . '/../Views/TipoExamen.php';

            } else {

                $mensaje = 'No se ha encontrado ningun Tipo de Examen';

                require_once __DIR__ . '/../Views/TipoExamen.php';
                
            }
                

            } else {

                $estado = 1;

                $mensaje = 'No se ha encontrado ningun Tipo de Examen';

                $tipoexamen = $this->instancia->mostrar();

                require_once __DIR__ . '/../Views/TipoExamen.php';

            }

        }
    
public function CambiarEstado()
    {
        if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['cambio']) && !empty($_GET['cambio'])) {
            $id = $_GET['id'];
            $cambio = $_GET['cambio']; 
            $this->instancia->cambiarEstado($id,$cambio);
            header('location: /Banco-de-sangre/TipoExamen/Mostrar/');

        } else {
            header('location: /Banco-de-sangre/TipoExamen/Mostrar/');
            exit;
        }
    }
    public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $tiposexamen = $this->instancia->mostrarEditar($id);

            require_once __DIR__ . '/../Views/editar_TipoExamen.php';

        } else {

            header('location: /Banco-de-sangre/TipoExamen/Mostrar/');

        }
        
    }

    public function EditarTipoExamen(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $Nombre = $_POST['Nombre'] ?? '';
            $Descripcion = $_POST['Descripcion'] ?? '';
            $Categoria = $_POST['Categoria'] ?? '';

            $this->instancia->editar($id,$Nombre,$Descripcion,$Categoria);

            header('location: /Banco-de-sangre/TipoExamen/Mostrar/');
            exit;

        } else {
            header('location: /Banco-de-sangre/Mostrar/');
            exit;
        }

    }
}
