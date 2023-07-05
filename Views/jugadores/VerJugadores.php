<?php
// session_start();
// if (!isset($_SESSION['id'])) {
//     header("Location:../../index.php");
// }

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/JugadorModel.php';

$datos = new JugadorModel();
$registros = $datos->getAll();
?>


<div class="Imgverjugador">
    <div class="container text-center ">
        <div class="row">
            <div class="col">
                <h1>¡Bienvenido! Ahora podrás ingresar tus Jugadores</h1>
            </div>
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-black">
                                    <h3 class="text-center text-info my-4 fs-4">Aquí va el nombre del jugador</h3>
                                </div>

                                <div class="card-body bg-danger">
                                    <table class="table bg-info table-striped">
                                        <thead>
                                            <tr>
                                                <h2 class="text-white">Jugadores Creados</h2>
                                                <th class="" scope="col">#</th>
                                                <th scope="col">Nombre Completo</th>
                                                <th scope="col" colspan="3">Opción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pos = 1;
                                            if ($registros) {
                                                foreach ($registros as $row) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $pos ?>
                                                        </td>
                                                        <td>
                                                            <?= $row->nombre_completo ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-warning" href="guardar.php?id=<?= $row->id ?>">Ver
                                                                Jugador</a>
                                                            -
                                                            <a class="btn btn-success"
                                                                href="../../Controllers/jugadorController.php?c=2&id=<?= $row->getId() ?>"
                                                                onclick="return confirm('¿Estás seguro de que deseas actualizar la información de este jugador?')">Actualizar</a>
                                                            -
                                                            <a class="btn btn-danger"
                                                                href="../../Controllers/JugadorController.php?c=4&id=<?= $row->getId() ?>"
                                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este jugador?')">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $pos++;
                                                }
                                            } else {
                                                ?>
                                            <tr class="text-center">
                                                <td colspan="6">Sin datos</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>