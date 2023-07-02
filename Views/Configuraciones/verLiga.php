<?php
include_once(__DIR__ . "../../../config/rutas.php");

include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once __DIR__ . "../../../Models/EstadisticasModel.php";

$data = new EstadisticasModel();
$liga = $data->ligas();


?>
<div class="imgCon">
    <div class="container mt-5 pt-5">
        <div class="row pt-5">
            <div class="col d-flex justify-content-center" >
                <div class="table-responsive " style="width: 50%;">
                    <table class="table table-dark table-striped text-info fs-5" >
                        <thead class="fs-3">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 45%">Pais</th>
                                <th scope="col" style="width: 25%">Opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pos = 1;
                            if ($liga) {
                                foreach ($liga as $row) {
                            ?>
                                    <tr>
                                        <td><?= $pos ?></td>
                                        <td><?= $row->nombre?></td>
                                        <td>
                                            <a class="btn btn-danger" id="deleteli" href="../../Controllers/EstadisticasController.php?c=8" data-id="<?= $row->id ?>" onclick="obtenerli(event); return false;">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php
                                    $pos++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3">No se encontraron registros</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="col mt-4">
                        <a href="index.php" class="btn btn-warning btn-block" id="btn_copas">regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function obtenerli(event) {
        event.preventDefault(); // Evita que el enlace se abra de inmediato

        var elemento = event.target; // Obtiene el elemento que desencadenó el evento (en este caso, el enlace)
        var id = elemento.dataset.id; // Obtiene el ID del atributo de datos personalizado

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Se eliminara la liga!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "No, cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "¡Eliminado!",
                    "Se ha elimindo la liga",
                    "success"
                ).then(() => {
                    // Redirige a la URL con el ID eliminado
                    window.location.href = "../../Controllers/EstadisticasController.php?c=8&id=" + id;
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    "Cancelado",
                    "Tu estadística está a salvo",
                    "error"
                );
            }
        });

        console.log("El ID del enlace es: " + id);
    }
</script>


<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>