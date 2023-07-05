<?php
include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/JugadorModel.php';

$datos = new JugadorModel();
$registros = $datos->getAll();


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
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-colorr">
                                    <h3 class="text-center text-light my-4 fs-4">Ingresar Jugadores</h3>
                                </div>

                                <div class="card-body bg-colorbody ">
                                    <form action="../../Controllers/JugadorController.php" method="POST">
                                        <input type="hidden" name="c" value="1">

                                        <div class="mb-3 bg-color1 text-primary">
                                            <div class="row">


                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="nombre_completo" type="text" placeholder="Nombre Completo" name="nombre_completo" required />
                                                        <label for="nombre_completo">Nombre Completo</label>
                                                    </div>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="apodo" placeholder="Apodo" name="apodo" />
                                                        <label for="apodo">Apodo</label>
                                                    </div>
                                                </div>
                                                <div class="form-floating col-md-6 mt-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" class="form-control" id="caracteristicas" placeholder="Caracteristicas" name="caracteristicas" />
                                                        <label for="nombre_completo">caracterisitcas</label>
                                                    </div>
                                                </div>

                                                <div class="form-floating col-md-6 mt-2">
                                                    <div class="form-floating pt-2">
                                                        <label for="fecha_nacimiento" id="fecha_nacimiento" class="form-label ">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                                    </div>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_equipo" name="id_equipo" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Equipo</option>
                                                        <?php foreach ($equipos as $equipo) :; ?>
                                                            <option value="<?= $equipo->getId() ?>"><?= $equipo->getid_equipos() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_liga" name="id_liga" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Liga</option>
                                                        <?php foreach ($ligas as $nombre) :; ?>
                                                            <option value="<?= $nombre->getId() ?>"><?= $nombre->getid_ligas() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_contiente" name="id_contiente" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Continente</option>
                                                        <?php foreach ($continentes as $nombre) :; ?>
                                                            <option value="<?= $nombre->getId() ?>"><?= $nombre->getid_continentes() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_pais" name="id_pais" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Pais</option>
                                                        <?php foreach ($paises as $nombre) :; ?>
                                                            <option value="<?= $nombre->getId() ?>"><?= $nombre->getid_paises() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_posicion" name="id_posicion" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Posicion</option>
                                                        <?php foreach ($posiciones as $nombre) :; ?>
                                                            <option value="<?= $nombre->getId() ?>"><?= $nombre->getid_posicion() ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <div class="form-floating col-md-6 mt-3">
                                                    <select class="form-select" id="id_perfil" name="id_perfil" aria-label="Default select example" required>
                                                        <option selected value="">Seleccionar Perfil</option>
                                                        <?php foreach ($perfiles as $nombre) :; ?>
                                                            <option value="<?= $nombre->getId() ?>"><?= $nombre->getid_perfil() ?></option>
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


<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>

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
            alert("¡El jugador se ha creado exitosamente!");
        }
    });
</script>
