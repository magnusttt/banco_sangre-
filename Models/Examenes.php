<?php 

namespace APP\Models;
use APP\Models\Conexion;

class Examenes {

    private $conn;

    public function __construct(){
        $this->conn = Conexion::conectar();
    }
    public function Registrar($tipo_examen,$resultado,$estado_examen,$id_maquina,$id_donante,$id_personal,$fecha_hora_examen) {
        $sql = 
        "INSERT INTO examen(ID_Tipo_Examen,Resultado,Estado_Examen,ID_Maquina,ID_Donante,ID_empleado,Fecha_Hora_Examen) 
         values('$tipo_examen','$resultado','$estado_examen','$id_maquina','$id_donante','$id_personal','$fecha_hora_examen')";

        $this->conn->exec($sql);
    }
    public function filtrarUnidades($estado){
        $stmt = $this->conn->prepare("SELECT ex.ID_Examen, te.Nombre_Examen, ex.Resultado, ex.Estado_Examen, im.Serial, im.Nombre as Nombre_maquina, d.CI, d.primer_nombre as Nombre_donante, em.doc, em.primer_nombre as Nombre_empleado, ex.Fecha_Hora_Examen
                                        FROM examen ex
                                        JOIN tipo_examen te ON ex.ID_Tipo_Examen = te.ID_Tipo_examen
                                        JOIN inventario_maquina im ON ex.ID_Maquina = im.ID_maquina
                                        JOIN empleado em ON ex.ID_empleado = em.id_empleado
                                        JOIN donante d ON ex.ID_Donante = d.ID_Donante
                                        WHERE ex.Estado_Examen = ?");
        $stmt->execute([$estado]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}