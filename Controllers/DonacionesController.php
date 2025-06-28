<?php

namespace APP\Controllers;

use APP\Models\Control_donacion;

class DonacionesController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Control_donacion();
    }

    public function Mostrar(){

        $donacion = $this->instancia->mostrar();
        $mensaje = 'no hay donaciones registradas';
        require_once __DIR__ . '/../Views//../Views/Donaciones.php';
        
        }
    

}
