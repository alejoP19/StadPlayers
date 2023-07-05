<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}
include_once(__DIR__ . "../../../config/rutas.php");

include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once __DIR__ . "../../../Models/EstadisticasModel.php";
//traer jugadores de la base de datos

$juga = new EstadisticasModel();
$jugadores = $juga->getPlayers();


//traer los equipos de la base de datos

$data = new EstadisticasModel();
$equipos = $data->Equipos();

// trae los nombre de el tipo de partido
$data = new EstadisticasModel();
$tipoPartido = $data->TipoPartido();

//trae los nuemeros para el N° partido
$datos = new EstadisticasModel();
$nPartido = $datos->NumeroPartido();


?>

<audio id="sound" src="../../public/assets/audio/error.mp3" preload="auto"></audio>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="imgING">

    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg   justify-content-center" style="margin-top: 30%;">
                    <div class="card-header bg-black text-light">
                        <h3 class="text-center font-weight-light fs-1 my-4">Estadisticas</h3>
                    </div>
                    <div class="card-body text-white" style="background-color:#CDDDEC ;">

                        <form action="../../Controllers/EstadisticasController.php?c=1" method="POST">
                            <div class="card d-flex justify-content-around  py-3 px-3 "
                                style="background-color: #355878;">
                                <div class="row mb-3 ">
                                    <div class="col-md-6 mt-3 ">
                                        <div class="form-floating  mb-3 mb-md-0 ">
                                            <h4>Nombre Jugador</h4>
                                        </div>
                                    </div>
                                    <div class="form-floating col-md-6">
                                        <select class="form-select text-black" aria-label="Default select example"
                                            name="id_jugador" id="id_jugador">
                                            <option value="" disabled selected>Selecciona una opción</option>
                                            <?php foreach ($jugadores as $jugador) :; ?>


                                            <option value="<?= $jugador->getId() ?>">
                                                <?= $jugador->getNombreCompleto()  ?></option>";
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <h4>Equipo Rival</h4>
                                        </div>
                                    </div>
                                    <div class=" form-floating col-md-6 mt-3">
                                        <select class="form-select text-black" aria-label="Default select example"
                                            name="id_equipo" id="id_equipo">
                                            <option value="" disabled selected>Selecciona una opción</option>
                                            <?php foreach ($equipos as $equipo) :; ?>


                                            <option value="<?= $equipo->getId() ?>">
                                                <?= $equipo->getEquipo()  ?></option>";
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <h4>Tipo Partido </h4>
                                        </div>
                                    </div>
                                    <div class=" form-floating col-md-6 mt-3">
                                        <select class="form-select text-black" aria-label="Default select example"
                                            name="id_tipo_partido" id="id_tipo_partido">
                                            <option value="" disabled selected>Selecciona una opción</option>
                                            <?php foreach ($tipoPartido as $tipo) :; ?>

                                            <option value="<?= $tipo->getId() ?>">
                                                <?= $tipo->getTipoPartido() ?> </option>;
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <h4>N° Partido </h4>
                                        </div>
                                    </div>
                                    <div class=" form-floating col-md-6 mt-3">
                                        <select class="form-select text-black" aria-label="Default select example"
                                            name="numero_partido" id="numero_partido">
                                            <option value="" disabled selected>Selecciona una opción</option>
                                            <?php foreach ($nPartido as $numero) :; ?>

                                            <option value="<?= $numero->getId() ?>">
                                                <?= $numero->getNumeroPartido() ?></option>;
                                            <?php endforeach ?>
                                        </select>
                                    </div>



                                    <div class="col-md-6 mt-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <h4>Fecha Partido</h4>
                                        </div>
                                    </div>
                                    <div class=" form-floating col-md-6 mt-3">
                                        <div class="form-floating">
                                            <input class="form-control text-black" type="date" name="fecha_del_partido"
                                                id="fecha_del_partido" />
                                        </div>

                                    </div>

                                </div>


                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button class="btn btn-danger btn-block" id="submitBtn">Ingresar
                                        Estadísticas</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<script>
function mostrarAlerta() {
    var audio = document.getElementById("sound");
    audio.play();
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'porfavor llena todos los campos',
        showConfirmButton: true,
        timer: 4000,
        timerProgressBar: true,
        confirmButtonColor: "#DD6B55"
    })

    return false;
}

function validateForm() {
    var selectElements = document.querySelectorAll('select');
    var fechaPartido = document.getElementById('fecha_del_partido').value;

    if (fechaPartido === "") {
        return mostrarAlerta();
    }

    for (var select of selectElements) {
        if (select.value === "" || select.value === "default") {
            return mostrarAlerta();
        }
    }

    return true;
}

document.getElementById("submitBtn").addEventListener("click", function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Evitar la redirección
    }
});

var selectElements = document.querySelectorAll('select');
console.log(selectElements);

selectElements.forEach((select) => {
    select.addEventListener('change', () => {
        let valorOption = select.value;
        console.log(valorOption);

        var optionSelect = select.options[select.selectedIndex];
        console.log("Opción:", optionSelect.text);
        console.log("Valor:", optionSelect.value);
    });
});
</script>




<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>