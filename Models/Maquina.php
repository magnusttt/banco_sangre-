<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Maquina {

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function crear($serial,$nombre,$modelo,$descripcion){

        $sql = "INSERT INTO inventario_maquina(Serial,Nombre,Modelo,Descripcion) values('$serial','$nombre','$modelo','$descripcion')";

        $this->conn->exec($sql);

    }

    public function MostrarActivas(){

        $sql = "SELECT * from inventario_maquina where Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function MostrarInanctivas(){

        $sql = "SELECT * FROM inventario_maquina WHERE Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function busqueda($filtro,$parametro,$estado){

        $sql = "SELECT * FROM inventario_maquina WHERE Estado='$estado' && $filtro LIKE lOWER('%$parametro%')";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editar($id){

        $sql = "SELECT * FROM inventario_maquina where ID_maquina='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editarMaquina($id,$serial,$nombre,$modelo,$descripcion){

        $sql = "update inventario_maquina set Serial='$serial',Nombre='$nombre',Modelo='$modelo',Descripcion='$descripcion' where ID_maquina='$id'";

        $this -> conn ->exec($sql);

    }

    public function eliminar($id){

        $sql = "UPDATE inventario_maquina SET Estado='2' where ID_maquina='$id'";

        $this ->conn->exec($sql);

    }

    public function activar($id){
        
        $sql = "UPDATE inventario_maquina SET Estado='1' where ID_maquina='$id'";

        $this ->conn->exec($sql);

    }

}