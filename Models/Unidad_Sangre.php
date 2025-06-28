<?php

namespace App\Models;
use APP\Models\Conexion;

class Unidad_Sangre {

    private $conn;
    public $id_sangre;
    public $tipo_sangre;

    public function __construct() {
        $this->conn = Conexion::conectar();
    }

    public function MostrarUnidad(){

        $sql = "Select * from unidad_sangre";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function RegistrarUnidad($tipo_sangre,$unidad) {

        $sql = "INSERT INTO unidad_sangre (Tipo_sangre,ID_donacion) VALUES ('$tipo_sangre','$unidad')";

        $this->conn->exec($sql);
    }
    public function usarUnidad_sangre($id_sangre) {
    $sql = "UPDATE unidad_sangre SET Estado = 'Usada' WHERE ID_sangre = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id_sangre]); // <-- Pasa el parámetro como array
    }
    public function obtenerResumen() {
        $sql = "
            SELECT Tipo_sangre,
                SUM(CASE WHEN Estado = 'Disponible' THEN 1 ELSE 0 END) AS Disponibles,
                SUM(CASE WHEN Estado = 'usada' THEN 1 ELSE 0 END) AS Usadas,
                SUM(CASE WHEN Estado = 'vencida' THEN 1 ELSE 0 END) AS Vencidas,
                COUNT(*) AS Total
            FROM unidad_sangre
            GROUP BY Tipo_sangre
        ";
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function filtrarUnidades($estado) {
        $stmt = $this->conn->prepare("SELECT ID_sangre, Tipo_sangre, Estado, ID_donacion FROM unidad_sangre WHERE Estado = ?");
        $stmt->execute([$estado]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function filtrarUnidadesDisponiblesPorTipo($tipo_sangre) {
        $sql = "SELECT ID_sangre, Tipo_sangre FROM unidad_sangre WHERE Tipo_sangre = '$tipo_sangre' AND Estado = 'Disponible' ORDER BY ID_sangre LIMIT 1";
        $resultado = $this->conn->query($sql);
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);

    }
    
    

}