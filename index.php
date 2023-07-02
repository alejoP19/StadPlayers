<?php
include_once(__DIR__ . "../config/rutas.php");
session_start();
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
    <link href="public/assets/css/styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Russo One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="public/assets/img/IconStadplayers.ico" />
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

    <div class="ImgInicioDeSesion">
        <section class="vh-110">
            <div class="container py-5 h-10">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong card bg-black" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <strong>
                                    <h3 class="mb-5" style="font-family:Russo One; color: #9bdaff;">Iniciar Sesión</h3>
                                </strong>
                                <form action="Controllers/UsuarioController.php" method="POST">
                                    <input type="hidden" name="c" value="5">

                                    <div class="form-group mb-4">
                                        <input class="form-control form-control-lg" type="email" name="email">
                                        <strong><label class="form-label" for="email-2"
                                                style="font-family:Russo One; color:#9bdaff;">Correo/Nickname</label></strong>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input class="form-control form-control-lg" type="password" name="password">
                                        <strong><label class="form-label" for="password"
                                                style="font-family:Russo One; color:#9bdaff;">Contraseña</label></strong>
                                    </div>

                                    <div class="BotonIniciarSesion ">
                                        <button type="submit" name="submit" class="btn btn-dark">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Iniciar Sesión
                                        </button>

                                </form>

                            </div>
                            <form id="forgetForm" method="POST">
                                <div id="errorMessge" class="alert hidden">
                                </div>
                                <!-- <div class="form-check d-flex justify-content-start mb-2 mt-4">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <label class="form-check-label" for="form1Example3"
                                        style="font-family:Russo One; color: #9bdaff; padding-left: 2%;">
                                        Recuperar
                                        Contraseña
                                    </label>
                                </div> -->
                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                    <div class="BotonRecuperarContraseña ">
                                        <button name="submit" class="btn btn-white">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <a class="small"
                                                href="<?= BASE_URL ?>/Views/usuario/recuperar.php">¿Olvidaste tu
                                                Contraseña?</a>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4">
                            <!-- <button class="btn btn-lg btn-block btn-primary"
                                style="background-color: #dd4b39;font-family:Russo One;" type="submit"><i
                                    class="fab fa-google me-2"></i> Iniciar Sesión con Google </button> -->
                            <br>
                            <br>
                            <a class="btn btn-primary btn-lg btn-block" href="<?= BASE_URL ?>/Views/usuario/signUp.php"
                                style="font-family:Russo One;">
                                Crear
                                Usuario
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <?php
    include_once("Views/partials/footer.php");
    ?>