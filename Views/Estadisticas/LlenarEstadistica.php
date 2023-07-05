<?php
session_start();
if (!isset($_SESSION['id'])) {

    header("Location:../../index.php");
}

include_once(__DIR__ . "../../../config/rutas.php");
session_start();
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/EstadisticasModel.php';
$data = new EstadisticasModel();
$registros = $data->getUltimasEstadisticas();

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="imgIngreEstad">
    <div class="container text-center">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <div class="row pt-5 mt-5">
                            <div class="col text-white">
                                <h1>¡Bienvenido! Ahora Podrá ingresar sus estadísticas</h1>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-black text-info">
                                    <h3 class="text-center text-light my-4 fs-4">Ingresar Estadistica</h3>
                                </div>
                                <div class="card-body text-black" style="background-color: #CDDDEC">

                                    <div class=" row mb-3">
                                        <?php
                                        if ($registros) {
                                            foreach ($registros as $registro) { ?>
                                        <div class="col-md-6">

                                            <div class="col m-4">
                                                <hr class="my-4 border border-3 border-primary ">
                                                <input class="text-center" type="number"
                                                    id="estadistica-<?= $registro->getId() ?>"
                                                    name="estadistica-<?= $registro->getId() ?>"
                                                    value="<?= $registro->valor ?>" min="0" disabled />
                                            </div>

                                            <a class="btn btn-sm btn-danger"
                                                onclick="operacion(<?= $registro->getId() ?> ,'restar')">-</a>

                                            <label for="" class="form-label"><?= $registro->nombre ?></label>


                                            <a class="btn btn-sm btn-success"
                                                onclick="operacion(<?= $registro->getId() ?>,'sumar')">+</a>

                                        </div>

                                        <?php }
                                        }
                                        ?>

                                    </div>

                                    <hr class="my-4 border border-5 border-danger">

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <a class="btn btn-success" href="../Estadisticas/NuevaEstadistica.php">Crear
                                                Nueva Estadistica</a>
                                        </div>
                                        <br>
                                        <div class="d-grid">
                                            <a class="btn btn-primary" href="../Estadisticas/index.php">Guardar y volver
                                                a escoger jugador</a>
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
function operacion(id, tipo_operacion) {
    // console.log("holi")
    let elemento = document.getElementById(`estadistica-${id}`);
    let valor = tipo_operacion == "restar" ? parseInt(elemento.value) - 1 : parseInt(elemento.value) + 1;


    if (valor >= 0) {
        update(id, elemento, valor)
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La estadística no puede ser negativa',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    }
}

function update(id, elemento, valor) {
    console.log(id, elemento.value, valor)
    axios.post(`../../Controllers/EstadisticasController.php?c=2&id=${id}&valor=${valor}`)
        .then(function(response) {
            elemento.value = response.data.valor
        })
        .catch(function(error) {
            console.error(error);
        });
}
</script>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>