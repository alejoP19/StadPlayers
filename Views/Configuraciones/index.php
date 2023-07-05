<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}
include_once(__DIR__ . "../../../config/rutas.php");
include_once __DIR__ . "../../../Models/EstadisticasModel.php";
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");



?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="imgCon">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg justify-content-center" style="margin-top: 30%;">
                    <div class="card-header bg-black text-light">
                        <h3 class="text-center font-weight-light fs-1 my-4">Configuraciones</h3>
                    </div>
                    <div class="card-body text-black" style="background-color: #B7C7C7;">
                        <form action="../../Controllers/EstadisticasController.php?c=5" method="POST" onsubmit="return validateForm()">
                            <div class="card d-flex justify-content-center py-3 px-3 fs-3" style="background-color: #009392;">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="agre_equipo" class="text-center">Agregar Equipo</label>
                                        <input type="text" name="agre_equipo" id="agre_equipo" class="rounded w-100">
                                        <div class="col mt-4">
                                            <a href="verEquipos.php" class="btn btn-warning btn-block" id="btn_equipos">Ver equipos</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="agre_copa" class="text-center">Agregar Copa</label>
                                        <input type="text" name="agre_copa" id="agre_copa" class="rounded w-100">
                                        <div class="col mt-4">
                                            <a href="verCopas.php" class="btn btn-warning btn-block" id="btn_equipos">Ver copas</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="agre_pais" class="text-center">Agregar Pais</label>
                                        <input type="text" name="agre_pais" id="agre_pais" class="rounded w-100">
                                        <div class="col mt-4">
                                            <a href="verPaises.php" class="btn btn-warning btn-block" id="btn_equipos">Ver paises</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="agre_liga" class="text-center">Agregar Liga</label>
                                        <input type="text" name="agre_liga" id="agre_liga" class="rounded w-100">
                                        <div class="col mt-4">
                                            <a href="verLiga.php" class="btn btn-warning btn-block" id="btn_equipos">Ver
                                                tipos ligas</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="agre_tipo_partido" class="text-center">Agregar Tipo Partido</label>
                                        <input type="text" name="agre_tipo_partido" id="agre_tipo_partido" class="rounded w-100">
                                        <div class="col mt-4">
                                            <a href="verTipoPartido.php" class="btn btn-warning btn-block" id="btn_equipos">Ver tipos de partido</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <button class="btn btn-danger rounded w-100 p-1" id="submitBtn">Guardar</button>
                            </div>
                        </form>
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
    function validateForm() {
        var equipo = document.getElementById('agre_equipo').value;
        var copa = document.getElementById('agre_copa').value;
        var pais = document.getElementById('agre_pais').value;
        var liga = document.getElementById('agre_liga').value;
        var tipoPartido = document.getElementById('agre_tipo_partido').value;

        if (equipo === '' && copa === '' && pais === '' && liga === '' && tipoPartido === '') {
            // Utiliza SweetAlert2 para mostrar una alerta
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, complete al menos uno de los campos.'
            });
            return false;
        }

        return true;
    }
</script>