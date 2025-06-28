<?php 

namespace APP\Controllers;
use APP\Models\Inicio;

class InicioController {

    public $instancia;

    public function __construct() {

        $this->instancia = new Inicio();
        
    }

    public function Mostrar(){

        require_once __DIR__ . '/../Views/inicio.php';

    }

}