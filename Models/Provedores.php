<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Provedores {
    
    private $conn;

    public function __construct(){

        $this->conn = Conexion::conectar();
        
    }

    public function MostrarActivas(){

        $sql = "SELECT * from proveedor where Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function MostrarInanctivas(){

        $sql = "SELECT * FROM proveedor WHERE Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function busqueda($parametro,$estado){

        $sql = "SELECT * FROM proveedor WHERE Estado='$estado' && Doc LIKE lOWER('%$parametro%') AND Tipo_proveedor LIKE lOWER('%$parametro%') AND Nombre LIKE lOWER('%$parametro%')";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function Crear($Rif,$nombre,$tipo,$direccion,$telefono,$correo,$fecha){

        $sql = "INSERT INTO proveedor(Doc,Nombre,Tipo_proveedor,Direccion,Telefono,FI_po) Values('$Rif','$nombre','$tipo','$direccion','$telefono','$fecha')";

        $this->conn->exec($sql);

    }

    public function Editar($id){

        $sql = "SELECT * FROM proveedor where ID_proveedor='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editarProvedor($id,$Rif,$nombre,$direccion,$tipo,$telefono,$fecha){

        $sql = "update proveedor set Doc='$Rif',Nombre='$nombre',Tipo_proveedor='$tipo',Direccion='$direccion',Telefono='$telefono',FI_po='$fecha' where ID_proveedor='$id'";

        $this -> conn ->exec($sql);

    }

    public function eliminar($id){

        $sql = "UPDATE proveedor SET Estado='2' where ID_proveedor='$id'";

        $this->conn->exec($sql);
        
    }

    public function activarProveedor($id){
        
        $sql = "UPDATE proveedor SET Estado='1' where ID_proveedor='$id'";

        $this ->conn->exec($sql);

    }

}