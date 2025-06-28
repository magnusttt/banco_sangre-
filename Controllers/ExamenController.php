<?php 

namespace APP\Controllers;
use APP\Models\Examenes;
use APP\Models\Donante;
use APP\Models\Maquina;
use APP\Models\Personal;
use APP\Models\TipoExamen;
class ExamenController {
    private $instancia;

    public function __construct()
    {
        $this->instancia = new Examenes();
    }
    public function Mostrar(){
        $estado = $_POST['estado'] ?? null;
        $examenes = $estado ? $this->instancia->filtrarUnidades($estado) : [];
        $mensaje = 'No hay examenes registrados';
        require_once __DIR__ . "/../Views/Examen.php";
    }
    public function registrarExamenVista(){
        $donanteClass = new Donante();
        $maquinaClass = new Maquina();
        $personalclass = new Personal();
        $tipoclass = new TipoExamen();
        $donantes = $donanteClass->mostrar();
        $maquinas = $maquinaClass->MostrarActivas();
        $personales = $personalclass->MostrarActivas();
        $Tipos = $tipoclass->mostrar();
        require_once __DIR__ . "/../Views/registrar_Examen.php";
    }
    public function registrarExamen(){
        $tipo_examen = $_POST['tipo_examen'];
        $resultado = $_POST['resultado'];
        $estado_examen = $_POST['estado_examen'];
        $id_maquina = $_POST['id_maquina'];
        $id_donante = $_POST['id_donante'];
        $id_personal=$_POST['id_personal'];
        $fecha_hora_examen=$_POST['fecha_hora_examen'];
        $this->instancia->Registrar($tipo_examen,$resultado,$estado_examen,$id_maquina,$id_donante,$id_personal,$fecha_hora_examen);
        header("Location: /Banco-de-sangre/Examen/Mostrar");
    }
}