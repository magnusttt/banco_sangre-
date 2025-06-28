<?php 

namespace App\Models;
use APP\Models\Conexion;

class Insumo {

    private $conn;

    public function __construct(){
        $this->conn = Conexion::conectar();
    }
    public function Registrar($codigo_fabricante,$id_insumos,$id_proveedor,$fecha_fabricacion,$fecha_vencimiento) {
        $sql = 
        "INSERT INTO insumo(Codigo_fabricante, ID_categoria_insumo, ID_proveedor, Fecha_Fabricacion, Fecha_Vencimiento) 
         values('$codigo_fabricante','$id_insumos','$id_proveedor','$fecha_fabricacion','$fecha_vencimiento')";

        $this->conn->exec($sql);
    }
    public function filtrarUnidades($estado,$filtro) {
        $stmt = $this->conn->prepare(
            "SELECT i.ID_Insumo, i.Codigo_fabricante, ci.Nombre as Nombre_insumo, i.Fecha_Fabricacion, i.Fecha_Vencimiento, i.Estado, p.Doc, p.Nombre as Nombre_Proveedor
                    FROM insumo i
                    JOIN categoria_insumos ci ON i.ID_categoria_insumo = ci.ID_categoria_insumo
                    JOIN Proveedor p ON i.ID_Proveedor = p.ID_Proveedor
                    WHERE i.Estado = ? AND i.ID_categoria_insumo = ?");
        $stmt->execute([$estado,$filtro]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function obtenerResumen() {
        $sql = "SELECT ci.Nombre, ci.ID_categoria_insumo,
                    SUM(CASE WHEN Estado = 'Disponible' THEN 1 ELSE 0 END) AS Disponibles,
                    SUM(CASE WHEN Estado = 'usado' THEN 1 ELSE 0 END) AS Usadas,
                    SUM(CASE WHEN Estado = 'vencido' THEN 1 ELSE 0 END) AS Vencidas,
                    COUNT(*) AS Total
                FROM insumo i
                JOIN categoria_insumos ci ON i.ID_categoria_insumo = ci.ID_categoria_insumo
                GROUP BY Nombre, ID_categoria_insumo
        ";
        return $this->conn->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function MostrarBolsasDispponible(){
        $sql = "SELECT ci.Nombre,i.Codigo_fabricante,i.ID_Insumo FROM insumo i join categoria_insumos ci on i.ID_categoria_insumo = ci.ID_categoria_insumo WHERE i.Estado='Disponible' and ci.Nombre='Bolsa de sangre'";
        $resultado = $this->conn->query($sql);
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function MostrarJeringasDispponible(){
        $sql = "SELECT ci.Nombre,i.Codigo_fabricante,i.ID_Insumo FROM insumo i join categoria_insumos ci on i.ID_categoria_insumo = ci.ID_categoria_insumo WHERE i.Estado='Disponible' and ci.Nombre='Jeringa'";
        $resultado = $this->conn->query($sql);
        return $resultado->fetchAll(\PDO::FETCH_ASSOC);
    }

}
