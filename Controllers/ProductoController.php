<?php 

namespace APP\Controllers;

use APP\Models\Producto;

class ProductoController {

    private $instancia;

    public function __construct()
    {
        $this -> instancia = new Producto();
    }

    public function Mostrar(){

        $productos = $this -> instancia->Mostrar();

        require_once __DIR__ . '/../Views/Productos.php';

    }

}