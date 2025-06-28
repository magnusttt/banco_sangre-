<?php

namespace APP\Models;

use APP\Models\Conexion;

class Donante
{

    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::conectar();
    }

    public function crear($fecha, $cedula, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $fecha_n, $tipo, $tlf, $direccion, $nacionalidad, $tipo_telefono)
    {

        $sql = "INSERT INTO donante(Fecha_Ingreso_Info_Donante,CI,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,Fecha_Nacimiento,Tipo_sangre,Telefono,Direccion,Nacionalidad,Tipo_telefono) values('$fecha','$cedula','$p_nombre','$s_nombre','$p_apellido','$s_apellido','$fecha_n','$tipo','$tlf','$direccion','$nacionalidad','$tipo_telefono')";

        $this->conn->exec($sql);
    }

    public function mostrar()
    {

        $sql = "Select * from donante where Estado='1'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function mostrarinactivo()
    {

        $sql = "Select * from donante where Estado='2'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function busqueda($parametro, $estado)
    {

        $sql = "SELECT * FROM donante
        WHERE CI LIKE lower('%$parametro%')
            OR LOWER(primer_nombre) LIKE lower('%$parametro%')
            OR LOWER(segundo_nombre) LIKE lower('%$parametro%')
            OR LOWER(primer_apellido) LIKE lower('%$parametro%')
            OR LOWER(segundo_apellido) LIKE lower('%$parametro%')
        AND Estado = '$estado'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function mostrarEditar($id)
    {

        $sql = "SELECT * FROM donante where ID_Donante='$id'";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function editar($id, $fecha, $cedula, $p_nombre, $s_nombre, $p_apellido, $s_apellido, $fecha_n, $tipo, $tlf, $direccion, $nacionalidad, $tipo_telefono)
    {

        $sql = "update donante set Fecha_Ingreso_info_Donante='$fecha',CI='$cedula',primer_nombre='$p_nombre',segundo_nombre='$s_nombre',primer_apellido='$p_apellido',segundo_apellido='$s_apellido',Fecha_Nacimiento='$fecha_n',Tipo_sangre='$tipo',Telefono='$tlf',Direccion='$direccion',Nacionalidad='$nacionalidad',Tipo_telefono='$tipo_telefono' where ID_Donante='$id'";

        $this->conn->exec($sql);
    }

    public function eliminarDonante($id)
    {

        $sql = "update donante set Estado='2' where ID_Donante='$id'";

        $this->conn->exec($sql);
    }

    public function activarDonante($id)
    {

        $sql = "update donante set Estado='1' where ID_Donante='$id'";

        $this->conn->exec($sql);
    }
}
