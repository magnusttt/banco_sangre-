<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Login {

    private $conn;

    public function __construct() {
        $this->conn = Conexion::conectar();
    }

    public function login($usuario, $clave) {

        $sql = "SELECT usuario, clave FROM usuario";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

}