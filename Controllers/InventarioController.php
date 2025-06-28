<?php 

namespace APP\Controllers;
use APP\Models\Donante;
use APP\Models\Personal;
use APP\Models\Control_donacion;
use APP\Models\Control_insumos;
use APP\Models\Control_transfusion;
use APP\Models\Unidad_Sangre;
use APP\Models\Insumo;
use APP\Models\Paciente;

class InventarioController {

    private $instancia;

    public function __construct()
    {
        $this->instancia = new unidad_sangre();
    }

    public function Mostrar(){
        $resumen = $this->instancia->obtenerResumen();
        $estado = $_POST['estado'] ?? null;
        $unidades = $estado ? $this->instancia->filtrarUnidades($estado) : [];
        $mensaje = 'No hay unidades de sangre registradas';
        require_once __DIR__ . "/../Views/inventa_sangre.php";
    }
    public function registrarDonacionVista(){
        $donantesClass = new Donante();
        $personal = new Personal();
        $insumos = new Insumo();
        $donantes = $donantesClass->mostrar();
        $bolsas = $insumos->mostrarBolsasDispponible();
        $jeringas = $insumos->mostrarJeringasDispponible();
        $personal_activo = $personal->MostrarActivas();
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            require_once __DIR__ . "/../Views/registrar_donacion2.php";
            exit();
        }
        else{
            $donante = $donantesClass->mostrarEditar($_GET['id']);
            require_once __DIR__ . "/../Views/registrar_donacion.php";
        }

    }
    public function registrarTransfusionVista(){
        $pacientesClass = new Paciente();
        $unidadesClass = new Unidad_Sangre();
        $personal = new Personal();
        $pacientes = $pacientesClass->mostrar();
        $unidad = $unidadesClass->MostrarUnidad();
        $personal_activo = $personal->MostrarActivas();
        $pacienteId = $_GET['id'] ?? null;
        $tipo_sangre = $_GET['Tipo_sangre'] ?? null;
        if (!isset($_GET['id']) || empty($_GET['id']) || !isset($_GET['Tipo_sangre']) || empty($_GET['Tipo_sangre'])) {
            require_once __DIR__ . "/../Views/registrar_transfusion.php";
            exit();
        }
        else{
            $pacientes=$pacientesClass->mostrarEditar($pacienteId);
            $unidad=$unidadesClass->filtrarUnidadesDisponiblesPorTipo($tipo_sangre);
            require_once __DIR__ . "/../Views/registrar_transfusion2.php";
        }

    }

    public function registrarTransfusion(){
        $unidad_sangre = new Unidad_Sangre();
        $control_transfusion = new Control_transfusion();
        $id_paciente = $_POST['id_paciente'];
        $personal_id=$_POST['personal_id'];
        $fecha_transfusion=$_POST['fecha_transfusion'];
        $unidad_sangre_id=$_POST['id_sangre'];
        $control_transfusion->registrarTransfusion($fecha_transfusion, $unidad_sangre_id, $id_paciente,$personal_id);
        $unidad_sangre->usarUnidad_sangre($unidad_sangre_id,);
        header("Location: /Banco-de-sangre/Transfusiones/Mostrar");
    }
    public function registrarDonacion(){
        $control_donacion = new Control_donacion();
        $unidad_sangre = new Unidad_Sangre();
        $control_insumos = new Control_insumos();
        $id_donante = $_POST['id_donante'];
        $personal_id=$_POST['personal_id'];
        $fecha_donacion=$_POST['fecha_donacion'];
        $tipo_sangre=$_POST['tipo_sangre'];
        $jeringa = $_POST['jeringa'];
        $bolsa = $_POST['bolsa'];
        $control_donacion->registrarDonacion($fecha_donacion, $id_donante, $personal_id);
        $lastInsertId = $control_donacion->getLastInsertId();
        $unidad_sangre->RegistrarUnidad($tipo_sangre, $lastInsertId);
        $control_insumos->registrarInsumos($fecha_donacion,$jeringa,$lastInsertId);
        $control_insumos->registrarInsumos($fecha_donacion,$bolsa,$lastInsertId);
        header("Location: /Banco-de-sangre/Donaciones/Mostrar");
    }

}
