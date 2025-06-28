<?php 

namespace App\Models;
use APP\Models\Conexion;

class Categoria_Insumo {

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }
    public function registrarCategoria($Nombre,$Unidad_medida,$Stock_minimo){

        $sql = "INSERT INTO categoria_insumos(Nombre,Unidad_medida,Stock_minimo) 
        values('$Nombre','$Unidad_medida','$Stock_minimo')";

        $this->conn->exec($sql);

    }
    
    public function mostrar(){

        $sql = "Select * from categoria_insumos";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function mostrarEditar($id){

        $sql = "SELECT * FROM categoria_insumos where ID_categoria_insumo='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editar($id,$Nombre,$Unidad_medida,$Stock_minimo){

        $sql = "update categoria_insumos set Nombre='$Nombre',Unidad_medida='$Unidad_medida',Stock_minimo='$Stock_minimo' where ID_categoria_insumo='$id'";

        $this -> conn ->exec($sql);

    }

    //public function cambiarEstado($id,$cambio){
    //    $sql = "update tipo_examen set Estado='$cambio' where ID_Tipo_Examen='$id'";
    //    $this->conn->exec($sql);
    //    $cambio=null;
    //}
}