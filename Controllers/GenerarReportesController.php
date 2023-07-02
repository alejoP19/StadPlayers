<?php
require_once __DIR__ . '../../Models/GenerarReportesModel.php';




//Instanciando la clase CalculadoraController
$usuario = new ReportesController();

class ReportesController
{
    public $id_usuario;
    private $reportesModel;
    public $smg;
    public $id;

    public  $consultaEstadisticasPre;
    // public $consultaPromedio;
    // public $consultaTotalMinutos;
    // public $consultaTotalPartidos;
    // public  $consultaEstadisticasPor;
    // public  $consultaEstadisticasnuevas;
    public $reporte;
    public function __construct()
    {

        $this->reportesModel = new ReportesModel();

        if (isset($_REQUEST['c'])) {
            $controlador = $_REQUEST['c'];
            switch ($controlador) {
                case 1: //Store
                    self::Store();
                    break;
                case 2: //Eliminar
                    self::destroy();

                    break;
                case 3: //Ver por operacion
                    self::show();

                    break;
                case 4:
                    // self::update();
                    break;
                case 5:
                    self::ChartEstadisticasPre();

                    break;
                case 6:
                    self::showPdf();
                    break;
            }
        }
    }

    public function Store()
    {
        $id_usuario =  $_SESSION['id'];
        $datos = [
            'fechaInicial'  => $_REQUEST['fechaInicial'],
            'fechaFinal'    => $_REQUEST['fechaFinal'],
            'id_jugador'    => $_REQUEST['nombre_completo'],
            'id_usuario'    => $id_usuario,
        ];


        $result =  $this->reportesModel->Store($datos);
        header("Location: ../views/Reportes/index.php");
    }

    public function destroy()
    {
        $id = $_REQUEST['id'];
        $data = $this->reportesModel->destroy($id);
    }

    public function show()
    {

        $id_reporte = $_REQUEST['id'];

        $reporte                  = $this->reportesModel->getReporteId($id_reporte);
        $datosJugador             = $this->reportesModel->DatosJugadorReporte($id_reporte);
        $totalMinutosJugados      = $this->reportesModel->getTotalMinutos($reporte);
        $totalPartidosJugados     = $this->reportesModel->getTotalPartidos($reporte);
        $promedio                 = $this->reportesModel->promedio($reporte);
        $totalEstadisticasPre     = $this->reportesModel->getTotalEstadPre($reporte);
        $totalEstadisticasPortero = $this->reportesModel->getTotalEstadPortero($reporte);
        $nuevasEstadisticas       = $this->reportesModel->getNuevaEstadistica($reporte);

        $params =
            http_build_query($reporte)
            . "&totalMinutosJugados="  . ($totalMinutosJugados)
            . "&totalPartidosJugados=" . ($totalPartidosJugados)
            . "&promedio="             . ($promedio)
            . "&" . http_build_query($datosJugador)
            . "&" . http_build_query($totalEstadisticasPre)
            . "&" . http_build_query($totalEstadisticasPortero)
            . "&" . http_build_query($nuevasEstadisticas);

        header(
            "Location: ../Views/Reportes/VerReporteIndividual.php?" . $params
        );
    }

    public function ChartEstadisticasPre()

    {
        $id_reporte = $_REQUEST['id'];
        $reporte    = $this->reportesModel->getReporteId($id_reporte);
        $smg        = new ReportesModel();

        $consultaEstadisticasPre = $smg->getTotalEstadPre($reporte);
        $data_labels = array_keys($consultaEstadisticasPre);
        $labels = [];

        foreach ($data_labels as $key => $v) {
            $val = str_replace("pre_", "", $v);
            array_push($labels, $val);
        }

        $data   = array_values($consultaEstadisticasPre);

        $result = [
            "labels" => $labels,
            "data"   => $data,
        ];


        echo json_encode($result);
    }

    public function getDateId()
    {
        $id_usuario = $_SESSION['id'];

        return $this->reportesModel->getPlayers() .
            $this->reportesModel->getById($id_usuario);
    }

    public function fechasReporte($items)
    {
        $items = [
            'fechaInicial' => ['fechaInicial'],
            'fechaFinal' => ['fechaFinal'],
        ];
        $this->reportesModel->getById($items);
        $result = $items;
        if ($result) {

            exit();
        }
    }

    public function showPdf()
    {

        $id_reporte = $_REQUEST['id'];
        $id_usuario     = $_SESSION['id'];

        $reporte                  = $this->reportesModel->getReporteId($id_reporte);
        $datosJugador             = $this->reportesModel->DatosJugadorReporte($id_reporte);
        $totalMinutosJugados      = $this->reportesModel->getTotalMinutos($reporte);
        $totalPartidosJugados     = $this->reportesModel->getTotalPartidos($reporte);
        $promedio                 = $this->reportesModel->promedio($reporte);
        $totalEstadisticasPre     = $this->reportesModel->getTotalEstadPre($reporte);
        $totalEstadisticasPortero = $this->reportesModel->getTotalEstadPortero($reporte);
        $nuevasEstadisticas       = $this->reportesModel->getNuevaEstadistica($reporte);
        $params =
            http_build_query($reporte)
            . "&usuario=" . ($id_usuario)
            . "&totalMinutosJugados="  . ($totalMinutosJugados)
            . "&totalPartidosJugados=" . ($totalPartidosJugados)
            . "&promedio="             . ($promedio)

            . "&" . http_build_query($datosJugador)
            . "&" . http_build_query($totalEstadisticasPre)
            . "&" . http_build_query($totalEstadisticasPortero)
            . "&" . http_build_query($nuevasEstadisticas);

        // var_dump($params);
        // die();

        header(
            "Location: ../Views/Reportes/reportePdf.php?" . $params
        );
        // header(
        //     "Location: ../Views/Reportes/fpdfReporte.php?" . $params
        // );
    }
}