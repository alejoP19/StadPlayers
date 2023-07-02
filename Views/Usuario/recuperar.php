<?php
include_once(__DIR__ . "../../../config/rutas.php");

?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>StadPlayers</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../../public/assets/css/styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Russo One&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="../../public/assets/img/IconStadplayers.ico" />
</head>

<body class="sb-nav-fixed">


    <nav class="sb-topnavLogin navbar navbar-expand navbar-black">
        <div class=" containerTituloLogin d-flex   mx-auto  d-md-inline-block  " style="margin-left:35%; margin-right:20%">
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
    <div class="ImgRecuperarContraseña">
        <main>
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg  border-0 rounded-lg mt-5" style="background-color: #4C356A">
                                <form autocomplete="off" id="forgotPasswordForm">
                                    <div class="card-header" style="background-color:#FFFFFF;">
                                        <h3 class="text-center text-black font-weight-light my-4">Recuperar
                                            Contraseña
                                        </h3>
                                    </div>
                                    <div class="form-message" id="msg">

                                    </div>

                                    <div class="card-body">

                                        <div class="small mb-3 text-muted">Ingrese su correo electronico y le
                                            enviaremos
                                            un
                                            link para restaurar su contraseña.
                                        </div>

                                        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="Ingrese su correo">
                                        </input>

                                        <div class="BotonIniciarSesion d-flex align-items-center justify-content-center mt-4 mb-4 ">
                                            <input type="submit" name="submit_btn" value="recuperar" class="btn btn-dark">
                                            </input>
                                        </div>
                                </form>
                                <div class="card-footer text-center py-3" style="background-color:#00ECD4 ;">
                                    <div class="BotonIr ">
                                        <button name="submit" class="btn btn-white">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <a class="small" href="signUp.php">Deseas Crear Una cuenta?
                                                Ir!</a>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <?php
    include_once("../../Views/partials/footer.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#forgotPasswordForm").on('submit', function(e) {
                e.preventDefault();
                var email = $("#email").val();
                // alert(email);
                // return
                $.ajax({
                    type: "POST",
                    url: "olvideContraseña.php",

                    data: {
                        email: email
                    },

                    success: function(data) {

                        $(".form-message").css("display", "block");
                        $(".form-message").html(data);
                    }

                });
            });
        });
    </script>