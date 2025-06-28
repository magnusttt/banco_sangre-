<?php
    namespace APP\Models;
    use APP\Models\Conexion;

    class Control_donacion {

        private $conn;

        public function __construct() {
            $this->conn = Conexion::conectar();
        }

        public function registrarDonacion($fecha,$id_donante,$id_empleado) {
            $sql = "INSERT INTO control_donaciones (fecha, ID_Donante, ID_empleado) VALUES ('$fecha', $id_donante, $id_empleado)";
            $this->conn->exec($sql);
        }
        public function getLastInsertId() {
            return $this->conn->lastInsertId();
        }
        public function Mostrar(){
        $sql = "SELECT cd.ID_Donacion,cd.fecha, d.CI, d.primer_nombre as nombre_donante, e.doc, e.primer_nombre as nombre_empleado 
            FROM control_donaciones cd 
            JOIN donante d on cd.ID_Donante = d.ID_Donante 
            JOIN empleado e ON cd.ID_empleado = e.id_empleado";
        $resultado = $this->conn->query($sql);
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

        }
    }