<?php
session_start();
if (!isset($_SESSION['id'])) {

    header("Location:../../index.php");
}

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");
include_once '../../Models/conexionModel.php';
include_once '../../Models/JugadorModel.php';

$id = $_GET['id'];

$datos = new JugadorModel();
$registros = $datos->titulosGanados();

$equipos = $datos->equipos();
$jugadores = $datos->jugadores();
$copas = $datos->copas();
?>


<div class="Imgtitulos">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>¡Bienvenido! Ahora podrás ingresar tus Titulos de Los jugadores</h1>
            </div>
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-colorr">
                                    <h3 class="text-center text-light my-4 fs-4">Ingresar Titulos Obtenidos</h3>
                                </div>
                                <div class="card-body bg-color5">
                                    <form action="../../Controllers/JugadorController.php" method="POST">
                                        <input type="hidden" name="id_jugador" value="<?php echo $id; ?>">
                                        <input type="hidden" name="c" value="6">
                                        <div class="mb-3 ">
                                            <div class="row">
                                                <div class="col g-4 ">
                                                    <div class="col">
                                                        <div class="card bg-color6">
                                                            <div class="card-body">
                                                                <div class="card-header bg-colorr">
                                                                    <h5 class="text-center text-light my-4 fs-4">Titulos Obtenidos</h5>
                                                                </div>
                                                                <div class="form-floating mt-3">
                                                                    <select class="form-select text-black" id="id_equipo" name="id_equipo" aria-label="Default select example" required>
                                                                        <option selected>Seleccionar Equipo</option>
                                                                        <?php foreach ($equipos as $equipo) : ?>
                                                                            <option value="<?= $equipo->getId() ?>">
                                                                                <?= $equipo->getid_equipos() ?> </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-floating mt-3">
                                                                    <select class="form-select text-black" id="id_copa" name="id_copa" aria-label="Default select example" required>
                                                                        <option selected>Seleccionar Titulo Ganado</option>
                                                                        <?php foreach ($copas as $nombre) : ?>
                                                                            <option value="<?= $nombre->getId() ?>">
                                                                                <?= $nombre->getid_copa() ?> </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <div class="form-floating pt-2 text-black">
                                                                        <label for="fecha" id="fecha" class="form-label">Fecha Obtencion del Titulo</label>
                                                                        <input type="date" class="form-control" placeholder="Fecha de Titulo" name="fecha" id="fecha" required>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 mb-0">
                                                        <div class="d-grid">
                                                            <button class="btn btn-success btn-block" id="submitBtn">Guardar Historial</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <a class="btn btn-primary btn-block" href="guardar.php?id=<?php echo $id; ?>">Regresar</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="container text-center">

                                <?php

                                $datos = new JugadorModel();
                                $registros = $datos->ObtenerTitulos($id);

                                ?>
                                <div id="layoutAuthentication">
                                    <div id="layoutAuthentication_content">
                                        <div class="container">

                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <div class="card shadow-lg border-0 rounded-lg mt-5 bg-color2">
                                                        <div class="card-header bg-colorr">
                                                            <h3 class="text-center text-light my-4 fs-4"> Titulos Obtenidos</h3>
                                                        </div>
                                                        <table class="table bg-color2 table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Jugador</th>
                                                                    <th scope="col">Equipo</th>
                                                                    <th scope="col">Copa Ganada</th>
                                                                    <th scope="col">Fecha del Titulo Ganado</th>
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
                                                                            <td><?= $row->id_equipo ?></td>
                                                                            <td><?= $row->id_copa ?></td>
                                                                            <td><?= $row->fecha ?></td>
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


<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        var jugadorId = <?php echo $id; ?>; // Obtén el ID del jugador desde tu código PHP

        // Redireccionar a la página de historial conservando el mismo ID
        window.location.href = 'titulos.php?id=' + jugadorId;
    });
</script>


<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        var jugadorId = <?php echo $id; ?>; // Obtén el ID del jugador desde tu código PHP

        // Redireccionar a la página de historial conservando el mismo ID
        window.location.href = 'titulos.php?id=' + jugadorId;
    });
</script>

<?php include_once(BASE_DIR . "../../Views/partials/footer.php"); ?>