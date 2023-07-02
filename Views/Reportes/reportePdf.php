<?php
// if (!isset($_SESSION['id'])) {

//     header("Location:../../index.php");
// }else{
//     if($_SESSION['usuario']=="ok") {

//     $nombreUsuario=$_SESSION["nombreUsuario"];}
// }
ob_start();
include_once(__DIR__ . "../../../config/rutas.php");
include_once __DIR__ . "../../../Models/GenerarReportesModel.php";
require_once __DIR__ . '../../../Controllers/GenerarReportesController.php';
// include_once(BASE_DIR . "../../Views/partials/header.php");


$data = new ReportesController();
$datosPdf = $_REQUEST;


// var_dump($datosPdf);
// die();

// var_dump($datosReporte["id"]);
// die();
// 
// foreach ($datosPdf as $k => $v) {
//     print_r($k . "=>" . $v);
//     echo "<hr>";
// }


// die();

$encabezado = [

    "Fecha_Inicial" => $_REQUEST["fechaInicial"],
    "Fecha_Final" => $_REQUEST["fechaFinal"]
];

$datosJugador = [
    "Nombre" => $_REQUEST["nombre_completo"],
    "Apodo" => $_REQUEST["apodo"],
    "Equipo" => $_REQUEST["equipo"],
    "Liga" => $_REQUEST["liga"],
    "Posicion" => $_REQUEST["posicion"],
    "Total_Minutos" => $_REQUEST["totalMinutosJugados"],
    "Partidos_Jugados" => $_REQUEST["totalPartidosJugados"],
    "promedio" => $_REQUEST["promedio"],
    "id_posicion" => $_REQUEST["id_posicion"],

];

// var_dump($datosJugador);
// echo "<hr>";
// die();
ob_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../../public/assets/css/styles.css" rel="stylesheet" /> -->

    <title>StadplayerPDF</title>

    <style>
    #header {
        width: 100%;
        position: fixed;
        top: 0cm;
        left: 0cm;
        background-color: #000000 F;
    }

    #header #img {
        border-radius: 10px;
        margin-left: 24%;
        margin-top: 3%;
        align-items: center;
    }

    body {
        background-color: #265065;
        border-radius: 5px;
    }



    @page {
        margin-left: 0.2cm;
        margin-right: 0.2cm;
        margin-top: 0.2cm;
        margin-bottom: 0.2cm;

    }

    .titulo {
        margin-top: -2%;
        font-family: Russo One;
        text-align: center;
        color: white;
        font-weight: bold;


    }

    table {

        font-family: Russo One;
    }



    #footer {
        left: 0cm;
        bottom: 0cm;
        position: fixed;
        width: 100%;
        height: 6%;
        background-color: #CCFFFE;
    }

    .text h4 {

        text-align: right;
        margin-right: 3%;
        top: 1cm;
        bottom: 0cm;
        border-radius: 5px;
        color: black;

    }

    .fechas {
        margin-top: 28%;
        margin-left: 70%;
        width: 200px;
        padding: 6px;
        border: 1;
        background-color: #000000;
        border-radius: 5px;

    }

    .fechas table th {
        padding: 5px;
        background-color: #FFFFFF;
        color: black;
        text-align: center;
        border-radius: 3px;
        font-weight: bold;
    }

    .fechas table tbody {
        padding: 2px;
        /* background-color: #FFFFFF; */
        color: white;
        text-align: center;
        border-radius: 3px;
        font-weight: bold;
    }


    .datosJugador {
        margin-top: 2%;
        margin-left: 1.5%;
        width: 95%;
        padding: 7px;
        border: 1;
        background-color: #06EAD4;
        border-radius: 5px;
        font-weight: bold;
    }

    .datosJugador th {
        margin-top: 1%;
        margin-left: 3%;
        width: 95%;
        padding: 3px;
        border: 1;
        background-color: #000000;
        color: white;
        border-radius: 7px;
        font-weight: bold;
    }

    .datosJugador tbody {
        padding: 3px;
        background-color: white;
        color: black;
        text-align: center;
        font-weight: bold;
    }

    .datosJug {
        border-radius: 10px;
        padding: 6px;
    }


    .estadisticasPre {
        width: 37%;
        text-align: center;
        margin-top: 4%;
        margin-left: 12%;
        padding: 3px;
        border: 1;
        background-color: #FCE9EE;
        color: white;
        border-radius: 12px;
    }

    .nombreEstadPre {
        margin-left: 3%;
        width: 25%;
        border-radius: 8px;
        padding: 7px;
    }

    .nombreEstadPreValue {
        border-radius: 15px;
        width: 5%;
        border-radius: 17px;
        padding: 10px;
    }

    .estadisticasPre th {
        border-radius: 5px;
        width: 5%;
        text-align: center;
        margin-top: 1%;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #000000;
        color: white;
    }

    .estadisticasPre tbody {
        width: 10%;
        text-align: center;
        margin-top: 1%;
        font-weight: bold;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #06EAD4;
        color: black;
        border-radius: 3px;
    }


    .estadArquero {
        width: 30%;
        text-align: center;
        margin-top: -272%;
        margin-left: 60%;
        padding: 3px;
        border: 1;
        background-color: #FCE9EE;
        color: white;
        border-radius: 12px;

    }

    .nombreEstadArquero {
        margin-left: 3%;
        width: 35%;
        border-radius: 8px;
        padding: 7px;
    }

    .nombreEstadArqueroValue {
        border-radius: 15px;
        width: 5%;
        border-radius: 17px;
        padding: 10px;
    }

    .estadArquero th {
        border-radius: 5px;
        width: 5%;
        text-align: center;
        margin-top: 1%;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #000000;
        color: white;
    }


    .estadArquero tbody {
        width: 15%;
        text-align: center;
        margin-top: 1%;
        font-weight: bold;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #72C4FF;
        ;
        color: black;
        border-radius: 3px;
    }


    .estadNuevas {
        width: 25%;
        text-align: center;
        margin-top: 5%;
        margin-left: 62%;
        padding: 3px;
        border: 1;
        background-color: #FCE9EE;
        color: white;
        border-radius: 12px;
    }

    .nombreEstadNueva {
        margin-left: 3%;
        width: 25%;
        border-radius: 8px;
        padding: 7px;
    }

    .nombreEstadNuevaValue {
        border-radius: 15px;
        width: 5%;
        border-radius: 17px;
        padding: 10px;
    }

    .estadNuevas th {
        border-radius: 5px;
        width: 5%;
        text-align: center;
        margin-top: 1%;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #000000;
        color: white;




    }

    .estadNuevas tbody {

        width: 10%;
        text-align: center;
        margin-top: 1%;
        font-weight: bold;
        margin-left: 3%;
        padding: 8px;
        border: 1;
        background-color: #C3B2FF;
        color: black;
        border-radius: 3px;
    }
    </style>
</head>

<body>
    <div id="header">
        <div id="img">
            <img src="../../public\assets\img\tituloPdf.png" width="70%" />

        </div>
        <div class="titulo">
            <h1> Reporte del Jugador</h1>
        </div>
    </div>
    <br> <br>
    <div class="container">
        <div class="fechas">
            <strong>
            </strong>
            <table>
                <thead>
                    <tr>
                        <th>Fecha Inicial</th>
                        <th>Fecha Final</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($encabezado as $key => $dato) {
                        if ($key != 'id_posicion') { ?>
                    <td><?php str_replace("_", " ", $key)  ?><?= $dato ?></td>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="datosJugador">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apodo</th>
                        <th>Equipo</th>
                        <th>Liga</th>
                        <th>Posición</th>
                        <th>Total Minutos</th>
                        <th>Partidos Jugados</th>
                        <th>promedio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datosJugador as $key => $dato) {
                        if ($key != 'id_posicion') { ?>
                    <td class="datosJug"><?php str_replace("_", " ", $key)  ?><?= $dato ?></td>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="estadisticasPre">
            <table>
                <thead>
                    <tr>
                        <th>Estadisticas</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($datosPdf as $key => $value) {
                        if ("pre_" == substr($key, 0, 4)) {
                    ?>
                    <tr>
                        <td class="nombreEstadPre"> <?= str_replace("_", " ", str_replace("pre_", " ", $key)) ?></td>
                        <td class="nombreEstadPreValue"> <?= $value ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="estadArquero">
            <table>
                <thead>
                    <tr>
                        <th>Estadísticas de Arquero</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datosPdf as $key => $value) {
                        if ("por_" == substr($key, 0, 4)) {
                    ?>
                    <tr>
                        <td class="nombreEstadArquero"> <?= str_replace("_", " ", str_replace("por_", " ", $key)) ?>
                        </td>
                        <td class="nombreEstadArqueroValue"> <?= $value ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="estadNuevas">
            <table>
                <thead>
                    <tr>
                        <th>Estadísticas Nuevas</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datosPdf as $key => $value) {
                        if ("nueva_" == substr($key, 0, 6)) {
                    ?>
                    <tr>
                        <td class="nombreEstadNueva"> <?= str_replace("_", " ", str_replace("nueva_", " ", $key)) ?>
                        </td>
                        <td class="nombreEstadNuevaValue"> <?= $value ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="footer">
            <div class="text">
                <h4>@Derechos Reservados ADSI 2023</h4>
            </div>
        </div>
    </div>
</body>

</html>



<?php
require_once '../../dompdf_1-1-1/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$html = ob_get_clean();
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'letter');
$dompdf->render();
$dompdf->stream("StadPlayersPDF", array("Attachment" => 1));
// include "../../public/assets/img/Stadplayers.jpg";
// header("Content-type: application/pdf");
// header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();