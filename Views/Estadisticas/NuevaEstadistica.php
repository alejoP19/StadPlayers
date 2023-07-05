<?php
session_start();
if (!isset($_SESSION['id'])) {

    header("Location:../../index.php");
}

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");



?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="imgIngreEstad">
    <div class="container text-center">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container py-4">
                    <div class="row justify-content-center">
                        <form action="../../Controllers/EstadisticasController.php?c=3" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $id_usuario; ?>">

                            <div class="col-lg-12 mt-5 pt-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header bg-black ">
                                        <h3 class="text-center text-light my-4 fs-4">Crear Nueva Estadistica</h3>
                                    </div>
                                    <div class="card-body text-black" style="background-color:#CDDDEC ;">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-md-12 mt-3">
                                                <div class="form-floating mb-3 mb-md-0 text-center">
                                                    <h4>Nombre De La Nueva Estadistica</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-3 mx-auto">
                                                <input class="form-control text-center" type="text" id="nombre" name="nombre" autocomplete="off">
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <div class="form-floating mb-3 mb-md-0 text-center">
                                                    <h4>Descripccion De La Nueva Estadistica</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-3 mx-auto">
                                                <input class="form-control text-center" type="text" name="descripcion" id="descripcion" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block text-blackx">Agregar Estadisitca</button>

                                            </div>
                                            <br>
                                            <div class="d-grid">
                                                <a class="btn btn-success" href="../Estadisticas/LlenarEstadistica.php">Regresar</a>
                                            </div>
                                        </div>


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




<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>