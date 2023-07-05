<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit(); 
}

include_once(__DIR__ . "../../../config/rutas.php");
include_once(BASE_DIR . "../../Views/partials/header.php");
include_once(BASE_DIR . "../../Views/partials/aside.php");

include_once '../../Models/conexionModel.php';
include_once '../../Models/UsuarioModel.php';

$datos = new UsuarioModel();
$id = $_SESSION['id']; 
$registros = $datos->getById($id);

function obtenerIniciales($nickname)
{
    $iniciales = '';
    $palabras = explode(' ', $nickname);

    foreach ($palabras as $palabra) {
        $iniciales .= strtoupper(substr($palabra, 0, 1));
    }

    return $iniciales;
}
?>

<div class="ImgJUGADOR">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>¡Bienvenido! Ahora podrá Ver Usurario</h1>
            </div>
        </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-colorr">
                                    <h3 class="text-center text-light my-4 fs-4">Ver Usuario</h3>
                                </div>
                                <div class="card-body bg-colorbody">
                                    <?php
                                    if ($registros) {
                                        foreach ($registros as $row) {
                                            $nickname = $row->nickname;
                                            $initials = obtenerIniciales($nickname);
                                            $avatarUrl = "https://place-hold.it/50?text=$initials";
                                            ?>
                                            <div class="mb-3 bg-color1 text-primary">
                                                <div class="row">
                                                    <div class="col-md-2 mt-3">
                                                        <div class="avatar-circle">
                                                            <h1>
                                                                <?= $initials ?>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-3 text-black">
                                                        <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                            <strong>Email:</strong>
                                                            <br>
                                                            <?= $row->email ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-3 text-black">
                                                        <div class="card bg-dark text-light mt-2 pt-2 pb-2">
                                                            <strong>Nickname:</strong>
                                                            <br>
                                                            <?= $row->nickname ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a class="btn btn-sm btn-outline-primary" href="../jugadores/index.php">Regresar
                                                </a>
                                                <!-- <a class="btn btn-danger"
                                                    href="../../Controllers/UsuarioController.php?c=2&id=<?= $row->getId() ?>">Eliminar
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="../../Controllers/UsuarioController.php?c=4&id=<?= $row->getId() ?>">Deshabilitar
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="../../Controllers/UsuarioController.php?c=3&id=<?= $row->getId() ?>">Actualizar
                                                </a> -->
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                    <div class="mb-3 bg-color1 text-primary text-center">
                                        Sin datos
                                    </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .avatar-circle {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .avatar-circle h1 {
        font-size: 80px;
        color: #fff;
        text-transform: uppercase;
        margin: 0;
    }

    .card {
        padding: 10px;
        text-align: center;
    }
</style>

<?php
include_once(BASE_DIR . "../../Views/partials/footer.php");
?>