<?php 

namespace APP\Models;
use APP\Models\Conexion;

class TipoExamen {

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function crear($Nombre,$Descripcion,$Categoria){

        $sql = "INSERT INTO tipo_examen(Nombre_Examen,Descripcion,Categoria) 
        values('$Nombre','$Descripcion','$Categoria')";

        $this->conn->exec($sql);

    }

    public function mostrar(){

        $sql = "SELECT * FROM tipo_examen WHERE Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function mostrarinactivo(){

        $sql = "Select * from tipo_examen where Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function busqueda($parametro,$estado){

        $sql = "SELECT * FROM tipo_examen
        WHERE Nombre_Examen LIKE lower('%$parametro%')
            OR LOWER(Categoria) LIKE lower('%$parametro%')
        AND ID_Tipo_Examen = '$estado'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function mostrarEditar($id){

        $sql = "SELECT * FROM tipo_examen where ID_Tipo_Examen='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editar($id,$Nombre,$Descripcion,$Categoria){

        $sql = "update tipo_examen set Nombre_Examen='$Nombre',Descripcion='$Descripcion',Categoria='$Categoria' where ID_Tipo_Examen='$id'";

        $this -> conn ->exec($sql);

    }

    public function cambiarEstado($id,$cambio){
        $sql = "update tipo_examen set Estado='$cambio' where ID_Tipo_Examen='$id'";
        $this->conn->exec($sql);
        $cambio=null;
    }
}