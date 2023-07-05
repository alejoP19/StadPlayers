<?php
include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/conexionModel.php';
include_once '../../Models/JugadorModel.php';


$id = $_GET['id'];

$datos = new JugadorModel();
$registros = $datos->getById($id);

$equipos        = $datos->equipos();
$ligas          = $datos->ligas();
$paises         = $datos->paises();
$continentes    = $datos->continentes();
$posiciones     = $datos->posiciones();
$perfiles       = $datos->perfiles();
$copas          = $datos->copas();

?>


<div class="Imginspeccionar">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>¡Bienvenido! Ahora podrá ingresar sus Jugadores</h1>
            </div>
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-colorr ">
                                    <h3 class="text-center text-light my-4 fs-4"><?= $registros[0]->nombre_completo ?></h3>
                                </div>

                                <div class="card-body bg-color2">
                                    <?php
                                    if ($registros) {
                                        foreach ($registros as $row) { ?>
                                            <!-- div para la imagen -->

                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-4">

                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Apodo">Apodo</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->apodo ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="fecha Nacimiento">Fecha De Nacimiento</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->fecha_nacimiento ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Caracteristicas">Caracteristicas</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->caracteristicas ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Posicion">Posicion de Juego</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_posicion ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Perfil">Perfil de Juego</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_perfil ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="continente">Continente Donde Juega</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_contiente ?></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Pais">Pais Donde Juega</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_pais ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Liga">Liga Donde Juega</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_liga ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 text-black">
                                                            <strong>
                                                                <h5><label for="Equipo">Equipo Donde Juega</label></h5>
                                                            </strong>
                                                            <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                                <span><?= $row->id_equipo ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3 text-black">
                                                        <button class="btn btn-sm btn-success" id="btnAgregarHistorial">Añadir Historial</button>
                                                    </div>
                                                    <div class="col-md-6 mt-3 text-black">
                                                        <button class="btn btn-sm btn-success" id="btnAgregarTitulos">Añadir Titulos</button>
                                                    </div>

                                                    <div class="col-md-6 mt-3 text-black">
                                                        <div class="col-md-12 mt-3">
                                                            <a href="verjugadores.php" class="btn btn-warning">Ver Jugadores</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3 text-black">
                                                        <div class="col-md-12 mt-3">
                                                            <a href="index.php" class="btn btn-primary btn-block">Crear Jugador</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                    <?php }
                                    } ?>
                                </div>
                            </div>
                            <div class="container text-center">
                                <?php

                                $datos = new JugadorModel();
                                $registros = $datos->getObtener($id);

                                ?>
                                <div id="layoutAuthentication">
                                    <div id="layoutAuthentication_content">
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <div class="card shadow-lg border-0 rounded-lg mt-5 bg-color2">
                                                        <div class="card-header bg-colorr">
                                                            <h3 class="text-center text-light my-4 fs-4"> Historial Equipos</h3>
                                                        </div>
                                                        <table class="table bg-color2 table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Jugador</th>
                                                                    <th scope="col">Fecha Inicial</th>
                                                                    <th scope="col">Fecha Terminación</th>
                                                                    <th scope="col">Equipo</th>
                                                                    <th scope="col" colspan="2">Opción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $pos = 1;
                                                                if ($registros) {

                                                                    foreach ($registros as $row) {

                                                                ?>

                                                                        <tr>

                                                                            <td><?= $pos ?></td>
                                                                            <td><?= $row->id_jugador ?></td>
                                                                            <td><?= $row->fecha_inicial ?></td>
                                                                            <td><?= $row->fecha_terminacion ?></td>
                                                                            <td><?= $row->id_equipo ?></td>
                                                                            <!-- <th scope="col" >Opciones</th> -->

                                                                            <td>
                                                                                <a class="btn btn-danger" href="../../Controllers/JugadorController.php?c=7&id=<?= $row->getId() ?>">Eliminar</a>
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
                                            <div class="container text-center">

                                                <?php

                                                $datos = new JugadorModel();
                                                $registros = $datos->ObtenerTitulos($id);

                                                $equipos = $datos->equipos();
                                                $copas = $datos->copas();
                                                ?>

                                                <div class="container text-center">

                                                    <div id="layoutAuthentication">
                                                        <div id="layoutAuthentication_content">
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-12">
                                                                        <div class="card shadow-lg border-0 rounded-lg mt-5 bg-color2 bg-color2">
                                                                            <div class="card-header bg-colorr">
                                                                                <h3 class="text-center text-light my-4 fs-4">Titulos Obtenidos</h3>
                                                                            </div>


                                                                            <table class="table bg-color2 table-striped">
                                                                                <thead>
                                                                                    <tr>

                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">Jugador</th>
                                                                                        <th scope="col">Fecha Obtencion Titulo</th>
                                                                                        <th scope="col">Copa</th>
                                                                                        <th scope="col">Equipo</th>
                                                                                        <th scope="col" colspan="2">Opción</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    $pos = 1;
                                                                                    if ($registros) {
                                                                                        foreach ($registros as $row) {

                                                                                    ?>

                                                                                            <tr>

                                                                                                <td><?= $pos ?></td>
                                                                                                <td><?= $row->id_jugador ?></td>
                                                                                                <td><?= $row->fecha ?></td>
                                                                                                <td><?= $row->id_copa ?></td>
                                                                                                <td><?= $row->id_equipo ?></td>
                                                                                                <!-- <th scope="col" >Opciones</th> -->

                                                                                                <td>
                                                                                                    <a class="btn btn-danger" href="../../Controllers/JugadorController.php?c=8&id=<?= $row->getId() ?>">Eliminar</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<script>
    document.getElementById('btnAgregarHistorial').addEventListener('click', function() {
        var jugadorId = <?php echo $id; ?>; // Obtén el ID del jugador desde tu código PHP

        // Redireccionar a la página de historial conservando el mismo ID
        window.location.href = 'historial.php?id=' + jugadorId;
    });
</script>
<script>
    document.getElementById('btnAgregarTitulos').addEventListener('click', function() {
        var jugadorId = <?php echo $id; ?>; // Obtén el ID del jugador desde tu código PHP

        // Redireccionar a la página de historial conservando el mismo ID
        window.location.href = 'titulos.php?id=' + jugadorId;
    });
</script>
<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>