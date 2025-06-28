<?php

namespace APP\Controllers;

use APP\Models\Categoria_Insumo;
class Categoria_InsumoController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Categoria_Insumo();
    }

    public function RegistrarCategoria(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $Nombre = $_POST['Nombre'] ?? '';
            $Unidad_medida = $_POST['Unidad_medida'] ?? '';
            $Stock_minimo = $_POST['Stock_minimo'] ?? '';
            
            $this->instancia->registrarCategoria($Nombre,$Unidad_medida,$Stock_minimo);

            echo "Se guardo correctamente";

            header('location: /Banco-de-sangre/Categoria_insumo/Mostrar/');
        }
    }

    public function Mostrar(){
    $Categoria = $this->instancia->mostrar();
    $mensaje = 'No se ha encontrado ninguna categoria de insumo';         
    require_once __DIR__ . '/../Views/Categoria_insumo.php';

    }
    
//public function CambiarEstado()
 //   {
   //     if (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['cambio']) && !empty($_GET['cambio'])) {
   //         $id = $_GET['id'];
    //        $cambio = $_GET['cambio']; 
    //        $this->instancia->cambiarEstado($id,$cambio);
      //      header('location: /Banco-de-sangre/TipoExamen/Mostrar/');
//
  //      } else {
    //        header('location: /Banco-de-sangre/TipoExamen/Mostrar/');
   //         exit;
  //     }
  //  }
        public function Editar(){

        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = $_GET['id'];

            $Categorias = $this->instancia->mostrarEditar($id);

            require_once __DIR__ . '/../Views/editar_Categoria_insumo.php';

        } else {

            header('location: /Banco-de-sangre/Categoria_insumo/Mostrar/');

        }
        
    }

    public function EditarCategoria(){

        if(isset($_POST['id']) && !empty($_POST['id'])) {

            $id = $_POST['id'];
            $Nombre = $_POST['Nombre'] ?? '';
            $Unidad_medida = $_POST['Unidad_medida'] ?? '';
            $Stock_minimo = $_POST['Stock_minimo'] ?? '';

            $this->instancia->editar($id,$Nombre,$Unidad_medida,$Stock_minimo);

            header('location: /Banco-de-sangre/Categoria_insumo/Mostrar/');
            exit;

        } else {
            header('location: /Banco-de-sangre/Mostrar/');
            exit;
        }

    }
}
