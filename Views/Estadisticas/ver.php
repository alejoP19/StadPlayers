<?php
// session_start();
// if (!isset($_SESSION['id'])) {

//     header("Location:../../index.php");
// }

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/EstadisticasModel.php';

$id = $_GET['id'];

$data = new EstadisticasModel();
$registros = $data->verValores($id);

?>


<div class="imgVerr">
    <div class="container mt-5">
        <div class="col-lg-11">


            <div class="row mb-3 d-flex justify-content-center pt-5">
                <div class="col-lg-8 ">

                    <div class="card  shadow-lg bg-primary  border-0 rounded-lg mt-5 p-4  " id="EstadisticasPre">


                        <div class="row mb-3">
                            <?php
                            if (!empty($registros)) {
                                $primerRegistro = $registros[0]; // Obtenemos el primer registro para obtener el nombre del jugador
                            ?>
                                <div class="card-header bg-light text-light fs-5">
                                    <div class="row mb-3">
                                        <div class="col-9 mt-3">
                                            Estadísticas Del Jugador
                                        </div>
                                        <div class="col-3 bg-dark text-warning mt-3 border-3">
                                            <?php echo $primerRegistro->nombre_jugador; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>
                        </div>
                        <?php
                        foreach ($registros as $registro) {

                        ?>

                            <div class="col-12 card bg-dark text-light">
                                <ul class="list-group list-group-flush bg-info">
                                    <div class="row">
                                        <div class="col-9 bg-white text-dark p-2">

                                            <strong>
                                                <h5><label for="nombreEstadistica">
                                                        <?php echo $registro->nombre; ?>
                                                    </label>
                                                </h5>
                                            </strong>
                                        </div>
                                        <div class="col-3 bg-secondary ">
                                            <div class="card bg-dark text-light  m-1 pt-2 p-1">
                                                <span>
                                                    <?= $registro->valor ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>

                        <?php

                        }
                        ?>
                        <a class="btn btn-danger mt-3" href="../Estadisticas/verEstadisticas.php">Regresar</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>





<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>