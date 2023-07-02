<?php

include_once(__DIR__ . "../../../config/rutas.php");
include_once("../../Models/conexionModel.php");
include_once '../../Models/UsuarioModel.php';
$token = new UsuarioModel();
$db = new Database();


if (isset($_POST['email']) || ($_POST['password']) || ($_POST['confirmPassword'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($password) || empty($confirmPassword)) {

        echo "Espacio Vacio, debe llenarlo";
    } else {

        if ($password == $confirmPassword) {


            $hashed = md5($password);
            $sql = "UPDATE usuarios SET password = '$hashed' WHERE email  = '$email'";
            $query = $db->conect()->query($sql);

            $queryDelete = "DELETE FROM olvido_password  WHERE email  = '$email'";
            $query = $db->conect()->query($queryDelete);

            echo "<div style='color:#00FFFA; margin-left:2%;margin-top:2%'> <strong><h5>¡Su Contraseña Ha Sido actualizada Correctamente! 
            Haga Click <a href='../../index.php?'> Aquí  <a />para Iniciar Sesión</h5></strong></div>";
        } else {
            echo "<div style='color:#00FFFA; margin-left:2%;margin-top:2%'> <strong><h3>Las Contraseñas no Concuerdan.<h3></strong></div>";
        }
    }
}