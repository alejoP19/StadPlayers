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


?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="imgCon">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg justify-content-center" style="margin-top: 30%;">
                    <div class="card-header bg-black text-light">
                        <h3 class="text-center font-weight-light fs-1 my-4">Sugerencias</h3>
                    </div>
                    <div class="card-body text-black" style="background-color: #B7C7C7;">
                        <form action="https://formsubmit.co/7714cc136ec8365c1987f7043f7c8f9c" method="POST" onsubmit="return validateForm()">
                            <input type="hidden" name="_next" value="http://localhost/stadPlayers/Views/Sugerencias/index.php">
                            <input type="hidden" name="_captcha" value="false">


                            <div class="card d-flex justify-content-center py-3 px-3 fs-3" style="background-color: #009392;">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="sugerencias" class="text-center">Por favor, déjanos tus sugerencias, con ello mejoraremos día a día</label>
                                        <input type="text" name="sugerencias" id="sugerencias" class="rounded w-100">
                                    </div>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <button type="submit" class="btn btn-danger" id="btn_sugerencias">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var sugerencias = document.getElementById('sugerencias').value;

        if (sugerencias === '') {
            Swal.fire("Error", "Por favor, completa todos los campos.", "error");
            return false;
        }

        return true;
    }
</script>

<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>