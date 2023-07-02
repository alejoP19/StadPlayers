<?php
include_once(__DIR__ . "../../../config/rutas.php");

include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once __DIR__ . "../../../Models/EstadisticasModel.php";

$data = new EstadisticasModel();
$copa = $data->copas();


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
                                <th scope="col" style="width: 45%">Copas</th>
                                <th scope="col" style="width: 25%">Opcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pos = 1;
                            if ($copa) {
                                foreach ($copa as $row) {
                            ?>
                                    <tr>
                                        <td><?= $pos ?></td>
                                        <td><?= $row->nombre ?></td>
                                        <td>
                                            <a class="btn btn-danger" id="deleteco" href="../../Controllers/EstadisticasController.php?c=10" data-id="<?= $row->id ?>" onclick="obtenerco(event); return false;">Eliminar</a>
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
    function obtenerco(event) {
        event.preventDefault(); // Evita que el enlace se abra de inmediato

        var elemento = event.target; // Obtiene el elemento que desencadenó el evento (en este caso, el enlace)
        var id = elemento.dataset.id; // Obtiene el ID del atributo de datos personalizado

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Se eliminara esta copa,!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "No, cancelar",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "¡Eliminado!",
                    "Se ha eliminado la copa ",
                    "success"
                ).then(() => {
                    // Redirige a la URL con el ID eliminado
                    window.location.href = "../../Controllers/EstadisticasController.php?c=10&id=" + id;
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