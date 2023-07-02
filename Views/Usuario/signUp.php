<?php

include_once(__DIR__ . "../../../config/rutas.php");

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>StadPlayers</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../../Public/assets/css/styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Russo One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="../../public/assets/img/IconStadplayers.ico" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnavLogin navbar navbar-expand navbar-black">
        <div class=" containerTituloLogin d-flex   mx-auto  d-md-inline-block  "
            style="margin-left:35%; margin-right:20%">
            <font color="aqua" style="
            text-decoration: underline;
            text-decoration-color: rgb(255, 0, 0);
            ">
                STAD
            </font>
            <i class="fa-solid fa-futbol fa-spin" style="color: rgb(255, 255, 255)">
            </i>
            <font color="red" style="
            text-decoration: underline; 
            text-decoration-color: aqua">
                PLAYERS
            </font>
        </div>

    </nav>
    <div class="ImgCrearUsuario">
        <div class="container py-5 px-5 h-10 mt-0">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong card bg-black" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h2 class="fw-bold mb-2 text-light fs-3">Crear Usuario </h2>
                            <h2 class="text-light fs-5">O </h2>
                            <p class="text-white mb-1">
                                <br>
                                <a class="btn btn-outline-light btn-lg px-2 fs-5 text-info"
                                    href="<?= BASE_URL ?>../index.php">
                                    Iniciar Sesión</a>
                            </p>
                            <br><br> <br>
                            </strong>
                            <!-- ../../Controllers/UsuarioController.php -->
                            <form id="datos">
                                <!-- <input type="hidden" name="c" value="1"> -->
                                <div class="form-group mb-2 px-2">
                                    <input type="email" id="email" value=" " name="email" placeholder="Correo"
                                        class="form-control form-control-lg" />
                                    <strong><label class="form-label" for="typeEmailX-2" style=" color:#9bdaff;">Ingresa
                                            un
                                            Correo</label></strong>
                                </div>
                                <div class="form-group mb-4">
                                    <input class="form-control form-control-lg" id="nickname" value=""
                                        placeholder="Nickname" type="text" name="nickname">
                                    <strong><label class="form-label" for="nickname"
                                            style="font-family:Russo One; color:#9bdaff;">Nickname</label></strong>
                                </div>

                                <div class="form-outline mb-2 px-2">
                                    <input type="password" id="password" value="" name="password"
                                        placeholder="Contraseña" class="form-control form-control-lg" />
                                    <strong> <label class="form-label" for="typePasswordX-2"
                                            style="font-family:Russo One; color:#9bdaff;">Elige una
                                            Contraseña</label></strong>
                                </div>
                                <!-- <div class="form-outline mb-2 px-2">
                                <input type="password" name="password" class="form-control form-control-lg" />
                                <strong> <label class="form-label" for="typePasswordX-2"
                                        style="font-family:Russo One; color:#9bdaff;">Confirma tu
                                        Contraseña</label></strong>
                            </div> -->
                                <input type="submit" class="btn btn-outline-light btn-lg px-2 fs-5" value="Enviar">
                                </input>

                                <!-- <a href="../../index.php" class="btn btn-danger">Cancelar</a> -->
                                <!-- <div class="BotonIniciarSesion">
                                    <button type="submit" id="insert">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Crear
                                    </button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>

    <script>
    if (document.querySelector("#datos")) {
        let formulario = document.querySelector("#datos");
        formulario.onsubmit = function(e) {
            e.preventDefault();
            fntGuardar();
        }

        async function fntGuardar() {

            let correo = document.querySelector('#email').value;
            let nickname = document.querySelector('#nickname').value;
            let password = document.querySelector('#password').value;

            try {
                if (correo == "" || nickname == "" || password == "") {

                    Swal.fire(
                        'Todos los campos del formulario son obligarorios',
                        'Intentar De nuevo',
                        'error'
                    )
                } else {

                    const data = new FormData(formulario);

                    let resp = fetch("../../Controllers/UsuarioController.php?c=1", {
                        method: 'POST',
                        mode: 'cors',
                        cache: 'no-cache',
                        body: data

                    })

                    return new Promise(resp => {
                        Swal.fire({
                            background: '#000000',
                            title: '<b style="color:#03FFFF">Bienvenido!</b>',
                            html: '<b style="color:#2ECC71">¡Ahora podrás iniciar sesión, haz click en OK!</b>',
                            imageUrl: 'https://mundoentrenamiento.com/wp-content/uploads/2021/01/big-data-en-el-futbol-moderno.jpg',
                            imageWidth: '70%',
                            imageHeight: '60%',
                            imageAlt: 'Custom image',
                            // width: '70%',
                        }).then((resp) => {
                            if (resp.isConfirmed) {
                                window.location.href = "../../index.php";
                            }
                        });

                    });
                }
            } catch (err) {
                alert("ocurrió un error: " + err);

            }
        }
    }
    </script>

    <?php
    include_once("../../Views/partials/footer.php");
    ?>