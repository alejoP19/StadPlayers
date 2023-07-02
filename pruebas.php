<?php
foreach ($datosJugador as $key => $dato) {

    if ($key != 'id_posicion') { ?>

<td><?php str_replace("_", " ", $key)  ?><?= $dato ?></td>

<?php } ?>
<?php } ?>


<?php
if (count($datosJugador) > 0) {
    $pos = 1;
    foreach ($datosJugador as $dato) {

?>
<tr>
    <td><?php echo $pos; ?></td>
    <td><?php echo $dato->Nombre ?></td>
    <td><?php echo $dato->Apodo ?></td>
    <td><?php echo $dato->Equipo ?></td>
    <td><?php echo $dato->Liga ?></td>
    <td><?php echo $dato->Posicion ?></td>
    <td><?php echo $dato->Total_Minutos ?></td>
    <td><?php echo $dato->Partidos_Jugados ?></td>
</tr>
<?php $pos++;
    }
} else { ?>
<tr>
    <td colspan=" 9">No hay datos
    </td>
</tr>
<?php } ?>




$html = ob_get_clean();


require_once '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);


$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo-.pdf", array("Attachment" => false));



// $dompdf->setPaper('A4','Landscape');
// si no se quiere mostrar el contenido en format de carta o
// estas creando certifidados necesita mostrarlos en fora horzontal se puede usar esta función.

?>


<?php
// include_once(BASE_DIR . "../../Views/partials/header.php");
// include_once(BASE_DIR . "../../Views/partials/aside.php");
// session_start();


use Dompdf\Dompdf;
use Dompdf\Options;


# code...
$options = new Options();
$options->set('chroot', realpath(''));
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrat');
$dompdf->render();
$dompdf->stream("StadPlayersPDF", array("Attachment" => 0));
$nombreImagen = "jugador_11.jpg";
$imagenBase64 =  "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnable' => true));
$dompdf->setOptions($options);
// $HTML = "<img src=/Public/assets/img/tituloStadplayers.jpg>";

$dompdf->setPaper('letter');