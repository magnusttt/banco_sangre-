<?php
    namespace APP\Models;
    use APP\Models\Conexion;

    class Control_transfusion {

        private $conn;

        public function __construct() {
            $this->conn = Conexion::conectar();
        }

        public function registrarTransfusion($fecha,$id_sangre,$id_paciente,$id_empleado) {
            $sql = "INSERT INTO control_transfusiones (fecha, ID_sangre,ID_Paciente, ID_empleado) VALUES ('$fecha', '$id_sangre','$id_paciente', '$id_empleado')";
            $this->conn->exec($sql);
        }
        public function getLastInsertId() {
            return $this->conn->lastInsertId();
        }
        public function Mostrar(){
        $sql = "SELECT ct.ID_transfusion,ct.ID_sangre,ct.Fecha, p.CI, p.Primer_nombre as nombre_paciente, e.doc, e.primer_nombre as nombre_empleado, us.Tipo_sangre
            FROM control_transfusiones ct 
            JOIN unidad_sangre us on ct.ID_sangre = us.ID_sangre
            JOIN Paciente p ON ct.ID_Paciente = p.ID_paciente 
            JOIN empleado e ON ct.ID_empleado = e.id_empleado";
        $resultado = $this->conn->query($sql);
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

        }
    }