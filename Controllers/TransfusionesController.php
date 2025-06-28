<?php

namespace APP\Controllers;

use APP\Models\Control_transfusion;
class TransfusionesController
{

    private $instancia;

    public function __construct()
    {
        $this->instancia = new Control_transfusion();
    }

    public function Mostrar(){

        $transfusion = $this->instancia->mostrar();
        $mensaje = 'No hay transfusiones registradas';
        require_once __DIR__ . '/../Views//../Views/Transfusiones.php';
        
        }
    

}
