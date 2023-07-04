<?php
include_once(__DIR__ . "/../../config/rutas.php");
// include_once __DIR__ . "../../../Controllers/UsuarioController.php";
// $restriccion = new UsuarioController();

if (isset($_SESSION['id'])) {
    $id_sess = '';
    $id_sess = $_SESSION['id'];
}
?>

<ul class="navbar-nav ms-auto ms-md-0 me-5 me-lg-7">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>/Views/Usuario/index.php">
                    <i class="fa-solid fa-circle-user fa-beat-fade"
                        style="color: #DF00FE ; padding-left: 2%; padding-right:2%;">
                    </i>
                    Usuario
                </a>

            </li>

            <!-- <input type="hidden" name="c" value="5"> -->
            <!-- <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>../sugerencias.php">
                    <i class="fa-solid fa-user-pen fa-fade"
                        style="color: rgb(246, 255, 0); padding-left: 2%; padding-right:2%;"></i>
                    Sugerencias
                </a>
            </li> -->
            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a type="submit" class="dropdown-item" onclick="Confirmar(<?= $id_sess ?>)" id="id_sess"
                    value="<?= $id_sess ?>">
                    <i class="fa-solid fa-hand fa-shake"
                        style="color: #FF4633 ; padding-left: 2%; padding-right:2%;"></i>
                    Cerrar Sesión
                </a>
            </li>
        </ul>

    </li>

</ul>
<script>
function Confirmar(id_sess) {
    var id_session = id_sess
    try {
        if (id_session != "") {
            Swal.fire({
                    title: '¿Desea Cerrar la Sesión?',
                    text: "¡Descuida, Podrás volver en otra ocasión!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Cerrar!'
                })

                .then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '¡Sesión Cerrada! <br>¡Buen día! ',
                                showConfirmButton: true,

                            })
                            .then(() => {
                                var id_session = id_sess
                                $.ajax({
                                    url: "../../Controllers/UsuarioController.php?c=6&id=" + id_session,
                                    success: function(r) {

                                        document.location.reload();
                                        window.location.href = "../../index.php";

                                    }
                                })

                            })


                    } else {

                        (result.dismiss === Swal.DismissReason.cancel); {
                            Swal.fire('¡Excelente!, <br> ¡Continua Navegando!', '', 'info')

                        }
                    }
                })


            return false;
            timer: 7800;


        } else {

            console.log("Error")
        }


    } catch (err) {
        alert("ocurrió un error: " + err);

    }

}
</script>