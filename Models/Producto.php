<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Producto {

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function Mostrar(){

        // $sql = "SELECT * FROM maquina";

        // $resultado = $this->conn->query($sql);

        // return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }
    
}