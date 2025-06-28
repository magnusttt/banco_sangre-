<?php 

namespace APP\Controllers;

use APP\Models\Insumo;
use APP\Models\Provedores;
use APP\Models\Categoria_Insumo;

class InsumosController {

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Insumo();
    }

    public function Mostrar(){
        $resumen = $this->instancia->obtenerResumen();
        $estado = $_POST['estado'] ?? null;
        $filtro = $_POST['filtro'] ?? null;
        $insumos = $estado ? $this->instancia->filtrarUnidades($estado,$filtro) : [];
        $mensaje = 'No hay Insumos registrados';
        require_once __DIR__ . "/../Views/inventa_Insumos.php";
    }
    
    public function RegistrarInsumoVista(){
        $categoriasclass = new Categoria_Insumo();
        $proveedoresclass = new Provedores();
        $categoria = $categoriasclass->mostrar();
        $proveedor = $proveedoresclass->MostrarActivas();
        require_once __DIR__ . "/../Views/registrar_insumo.php";

    }
    public function RegistrarInsumo(){
        $codigo_fabricante = $_POST['Codigo_fabricante'];
        $id_insumos = $_POST['ID_insumos'];
        $id_proveedor = $_POST['ID_proveedor'];
        $fecha_fabricacion = $_POST['fecha_fabricacion'];
        $fecha_vencimiento = $_POST['fecha_vencimiento'];
        $this->instancia->Registrar($codigo_fabricante, $id_insumos, $id_proveedor, $fecha_fabricacion, $fecha_vencimiento);
        header("Location: /Banco-de-sangre/Insumos/Mostrar");
    }



}