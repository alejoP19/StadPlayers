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

    <?php
    include_once("../../Models/conexionModel.php");
    include_once '../../Models/UsuarioModel.php';
    $token = new UsuarioModel();
    $db = new Database();





    $items = [];
    $TokenEmail = '';
    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        $sql = "SELECT email FROM olvido_password WHERE token = '$token'";
        try {
            $items = [];
            $query = $db->conect()->query($sql);
            while ($row = $query->fetchObject()) {
                $item               = new UsuarioModel();
                $item->email   = $row->email;

                foreach ($row as $key => $value) {
                    $TokenEmail = $value;
                    // var_dump($TokenEmail);
                    // die();
                }
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    ?>
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
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg  border-0 rounded-lg mt-5" style="background-color: #4C356A  
 ">
                                    <div class="card-header" style="background-color:#FFFFFF;">

                                        <h3 class="text-center font-weight-light my-4">Nueva Contraseña</h3>
                                    </div>
                                    <div class="card-body" autocomplete="off">
                                        <form id="NuevaContraseña">
                                            <div class="form-message" id="msg">

                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email" value="<?php echo  $TokenEmail; ?>" placeholder="correo" />
                                                <label for="inputPassword">Correo Electronico</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password" placeholder="Contraseña" />
                                                <label for="inputPassword">Nueva Contraseña</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="confirmPassword" type="password" name="ConfirmPassword" placeholder="Confirmar Contraseña" />
                                                <label for="inputPassword">Confirmmar contraseña</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">

                                                <div class="BotonIniciarSesion d-flex justify-content-center mt-4 mb-4 ">
                                                    <input type="submit" name="submit_btn" value="recuperar" class="btn btn-dark">
                                                    </input>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center " style="background-color:#FFFFFF  ;">

                                        <a class="btn btn-info display:block" href="../../index.php">Salir

                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <?php
    include_once("../../Views/partials/footer.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#NuevaContraseña").on('submit', function(e) {

                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();
                // alert(email + password + confirmPassword);
                $.ajax({
                    type: "POST",
                    url: "restaurarContraseña.php",

                    data: {
                        email: email,
                        password: password,
                        confirmPassword: confirmPassword
                    },

                    success: function(data) {
                        $(".form-message").css("display", "block");

                        $(".form-message").html(data);
                        $("#NuevaContraseña")[0].reset();
                    }
                });
            });
        });
    </script>