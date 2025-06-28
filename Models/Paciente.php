<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Paciente {

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function crear($fecha,$nacionalidad,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$Tipo_sangre,$Tipo_telefono,$tlf,$direccion,$Descripcion){

        $sql = "INSERT INTO Paciente(Fecha_Ingreso_info_Paciente,Nacionalidad,CI,Primer_nombre,Segundo_nombre,Primer_apellido,Segundo_apellido,Fecha_Nacimiento,Tipo_sangre,Tipo_telefono,Telefono,Direccion,Descripcion) values('$fecha','$nacionalidad','$cedula','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$fecha_n','$Tipo_sangre','$Tipo_telefono','$tlf','$direccion','$Descripcion')";

        $this->conn->exec($sql);

    }

    public function mostrar(){

        $sql = "Select * from Paciente where Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function mostrarinactivo(){

        $sql = "Select * from Paciente where Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function busqueda($parametro,$estado){

        $sql = "SELECT * FROM Paciente
        WHERE CI LIKE lower('%$parametro%')
            OR LOWER(primer_apellido) LIKE lower('%$parametro%')
            OR LOWER(segundo_nombre) LIKE lower('%$parametro%')
            OR LOWER(segundo_apellido) LIKE lower('%$parametro%')
        AND ID_paciente = '$estado'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function mostrarEditar($id){

        $sql = "SELECT * FROM Paciente where ID_paciente='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function editar($id,$fecha,$nacionalidad,$cedula,$p_nombre,$s_nombre,$p_apellido,$s_apellido,$fecha_n,$Tipo_sangre,$Tipo_telefono,$tlf,$direccion,$Descripcion){

        $sql = "update Paciente set Fecha_Ingreso_info_Paciente='$fecha',CI='$cedula',primer_nombre='$p_nombre',segundo_nombre='$s_nombre',primer_apellido='$p_apellido',segundo_apellido='$s_apellido',Fecha_Nacimiento='$fecha_n',Tipo_sangre='$Tipo_sangre',Telefono='$tlf',Direccion='$direccion',Nacionalidad='$nacionalidad',Tipo_telefono='$Tipo_telefono',Descripcion='$Descripcion' where ID_paciente='$id'";

        $this -> conn ->exec($sql);

    }

    public function cambiarEstado($id,$cambio){
        $sql = "update Paciente set Estado='$cambio' where ID_paciente='$id'";
        $this->conn->exec($sql);
        $cambio=null;
    }
}