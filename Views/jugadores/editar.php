<?php

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");


include_once '../../Models/conexionModel.php';
include_once '../../Models/JugadorModel.php';


$datos = new JugadorModel();
$registros = $datos->editar($_REQUEST['id']);

foreach ($registros as $resultado) {
    $id                 = $resultado->getId();
    $nombre_completo    = $resultado->nombre_completo;
    $apodo              = $resultado->apodo;
    $fecha_nacimiento   = $resultado->fecha_nacimiento;
    $caracteristicas    = $resultado->caracteristicas;
    $id_equipo          = $resultado->id_equipo;
    $id_liga            = $resultado->id_liga;
    $id_pais            = $resultado->id_pais;
    $id_contiente       = $resultado->id_contiente;
    $id_posicion        = $resultado->id_posicion;
    $id_perfil          = $resultado->id_perfil;
}

$datos = new JugadorModel();
$equipos = $datos->equipos();

$datos = new JugadorModel();
$ligas = $datos->ligas();

$datos = new JugadorModel();
$paises = $datos->paises();

$datos = new JugadorModel();
$continentes = $datos->continentes();

$datos = new JugadorModel();
$posiciones = $datos->posiciones();

$datos = new JugadorModel();
$perfiles = $datos->perfiles();

$datos = new JugadorModel();
$copas = $datos->copas();
?>

<div class="ImgJUGADOR">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>¡Bienvenido! Ahora Podrá ingresar sus Jugadores</h1>
            </div>
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-colorr">
                                    <h3 class="text-center text-light my-4 fs-4">Ingresar Jugadores</h3>
                                </div>
                                <div class="card-body bg-colorbody ">
                                    <form action="../../Controllers/JugadorController.php" method="post">
                                        <input type="hidden" name="c" value="3">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <div class="mb-3 ">
                                            <div class="row bg-color1 text-primary">

                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="nombre_completo" type="text" placeholder="Nombre Completo" name="nombre_completo" value="<?= $nombre_completo ?>" required />
                                                        <label for="nombre_completo">Nombre Completo</label>
                                                    </div>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="apodo" placeholder="Apodo" name="apodo" value="<?= $apodo ?>" />
                                                        <label for="apodo">Apodo</label>
                                                    </div>
                                                </div>
                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="caracteristicas" placeholder="caracteristicas" name="caracteristicas" value="<?= $caracteristicas ?>" />
                                                        <label for="caracteristicas"> caracterisitcas</label>
                                                    </div>
                                                </div>

                                                <div class="form-floating col-md-6 mt-2">
                                                    <div class="form-floating pt-2">
                                                        <input type="datetime-local" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?= date('Y-m-d\TH:i:s', strtotime($fecha_nacimiento)) ?>" required>
                                                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                                                    </div>
                                                </div>


                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_equipo" name="id_equipo" aria-label="Default select example" required>
                                                        <?php foreach ($equipos as $equipo) : ?>
                                                            <?php if ($equipo->getId() == $id_equipo) : ?>
                                                                <option value="<?= $equipo->getId() ?>" selected>
                                                                    <?= $equipo->getid_equipos() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $equipo->getId() ?>">
                                                                    <?= $equipo->getid_equipos() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>



                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_liga" name="id_liga" aria-label="Default select example" required>
                                                        <?php foreach ($ligas as $nombre) : ?>
                                                            <?php if ($nombre->getId() == $ligas) : ?>
                                                                <option value="<?= $nombre->getId() ?>" selected>
                                                                    <?= $nombre->getid_ligas() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $nombre->getId() ?>">
                                                                    <?= $nombre->getid_ligas() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_contiente" name="id_contiente" aria-label="Default select example" required>
                                                        <?php foreach ($continentes as $nombre) : ?>
                                                            <?php if ($nombre->getId() == $id_contiente) : ?>
                                                                <option value="<?= $nombre->getId() ?>" selected>
                                                                    <?= $nombre->getid_continentes() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $nombre->getId() ?>">
                                                                    <?= $nombre->getid_continentes() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_pais" name="id_pais" aria-label="Default select example" required>
                                                        <?php foreach ($paises as $nombre) : ?>
                                                            <?php if ($nombre->getId() == $id_pais) : ?>
                                                                <option value="<?= $nombre->getId() ?>" selected>
                                                                    <?= $nombre->getid_paises() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $nombre->getId() ?>">
                                                                    <?= $nombre->getid_paises() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>


                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_posicion" name="id_posicion" aria-label="Default select example" required>
                                                        <?php foreach ($posiciones as $nombre) : ?>
                                                            <?php if ($nombre->getId() == $id_posicion) : ?>
                                                                <option value="<?= $nombre->getId() ?>" selected>
                                                                    <?= $nombre->getid_posicion() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $nombre->getId() ?>">
                                                                    <?= $nombre->getid_posicion() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_perfil" name="id_perfil" aria-label="Default select example" required>
                                                        <?php foreach ($perfiles as $nombre) : ?>
                                                            <?php if ($nombre->getId() == $id_perfil) : ?>
                                                                <option value="<?= $nombre->getId() ?>" selected>
                                                                    <?= $nombre->getid_perfil() ?>
                                                                </option>
                                                            <?php else : ?>
                                                                <option value="<?= $nombre->getId() ?>">
                                                                    <?= $nombre->getid_perfil() ?>
                                                                </option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark  btn-block" id="submitBtn">Guardar Jugador</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    document.getElementById("submitBtn").addEventListener("click", function(event) {
        var equipo = document.getElementById("id_equipo").value;
        var liga = document.getElementById("id_liga").value;
        var continente = document.getElementById("id_contiente").value;
        var pais = document.getElementById("id_pais").value;
        var posicion = document.getElementById("id_posicion").value;
        var perfil = document.getElementById("id_perfil").value;

        if (equipo === "" || liga === "" || continente === "" || pais === "" || posicion === "" || perfil === "") {
            event.preventDefault();
            alert("Por favor, seleccione una opción en todos los campos obligatorios.");
        } else {
            var confirmacion = confirm("¿Seguro que desea realizar estos cambios al jugador?");
            if (!confirmacion) {
                event.preventDefault();
            }
        }
    });
</script>

<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");

?>