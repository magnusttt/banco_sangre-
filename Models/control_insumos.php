<?php
    namespace APP\Models;
    use APP\Models\Conexion;

    class Control_insumos {

        private $conn;

        public function __construct() {
            $this->conn = Conexion::conectar();
        }

        public function registrarInsumos($fecha,$id_insumo,$id_donacion) {
            $sql = "INSERT INTO control_insumo (Fecha_uso, ID_insumo, ID_donacion) VALUES ('$fecha','$id_insumo','$id_donacion');
                    UPDATE insumo SET Estado = 'Usado' WHERE ID_Insumo = '$id_insumo'";
            $this->conn->exec($sql);
        }
        
        public function getLastInsertId() {
            return $this->conn->lastInsertId();
        }
        public function usarinsumo($id_insumo) {
        $sql = "UPDATE insumo SET Estado = 'Usado' WHERE ID_Insumo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($$id_insumo);
    }
    }