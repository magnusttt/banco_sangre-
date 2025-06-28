<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Personal {

    private $conn;

    public function __construct(){

        $this->conn = Conexion::conectar();
        
    }

    public function MostrarActivas(){

        $sql = "SELECT * from empleado where Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function MostrarInanctivas(){

        $sql = "SELECT * FROM empleado WHERE Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function busqueda($filtro,$parametro,$estado){

        $sql = "SELECT * FROM empleado WHERE Estado='$estado' && $filtro LIKE lOWER('%$parametro%')";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function Crear($nacionalidad, $doc, $nombre_pri, $nombre_seg, $apellido_pri, $apellido_seg,$tipo_telefono, $fecha_nac, $telefono, $direccion, $cargo, $fecha_ingreso){

        $sql = "INSERT INTO empleado (nacionalidad, doc, primer_nombre, segundo_nombre, primer_nombre, segundo_apellido, Fecha_Nacimiento,Tipo_telefono, telefono, Direccion, Cargo, Fi_personal, Estado) Values('$nacionalidad','$doc','$nombre_pri','$nombre_seg','$apellido_pri','$apellido_seg','$fecha_nac','$tipo_telefono','$telefono','$direccion','$cargo','$fecha_ingreso','1')";

        $this->conn->exec($sql);

    }

    public function Editar($id){

        $sql = "SELECT * FROM empleado where id_empleado='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editarPersonal($id, $nacionalidad, $doc, $nombre_pri, $nombre_seg, $apellido_pri, $apellido_seg, $fecha_nac, $tipo_telefono, $telefono, $direccion, $cargo, $fecha_ingreso){

        $sql = "update empleado set nacionalidad='$nacionalidad', doc='$doc', primer_nombre='$nombre_pri' , segundo_nombre='$nombre_seg', primer_apellido='$apellido_pri' , segundo_apellido='$apellido_seg', Fecha_Nacimiento='$fecha_nac', Tipo_telefono='$tipo_telefono', Telefono='$telefono', Direccion='$direccion', Cargo='$cargo', FI_personal='$fecha_ingreso'  where id_empleado='$id'";

        $this -> conn ->exec($sql);

    }

    public function eliminarPersonal($id)
    {

        $sql = "update empleado set Estado='2' where id_empleado='$id'";

        $this->conn->exec($sql);
    }

    public function activarPersonal($id)
    {

        $sql = "update empleado set Estado='1' where id_empleado='$id'";

        $this->conn->exec($sql);
    }

    
}