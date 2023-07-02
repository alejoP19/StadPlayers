<?php

include_once(__DIR__ . "../../../config/rutas.php");
include_once("../../Models/conexionModel.php");
include_once '../../Models/UsuarioModel.php';
$usuario = new UsuarioModel();
$db = new Database();
session_start();
// $email = implode(",", $_POST);




if (isset($_POST['email'])) {

    $email = $_POST['email'];
    // var_dump($email);
    // die();
    $sql = "SELECT * FROM usuarios WHERE Email ='$email'";
    $query = $db->conect()->query($sql);
    if (empty($email)) {
        echo "Campo vacio";
    } else {
        if ($query) {
            try {
                $dato = '';
                while ($row = $query->fetch()) {
                    $item = new UsuarioModel();

                    $item->myEmail = $row['Email'];

                    $dato = $item->myEmail = $row['Email'];
                }

                if ($dato == $email) {

                    $token = uniqid(md5(time()));
                    $insert_query = "INSERT INTO olvido_password(email,token) VALUES('$email','$token')";
                    $res  = $db->conect()->query($insert_query);

                    $to = $email;
                    $subject = "Link de restauración de contraseña";
                    $msg = 'Has Click <a href="http://localhost/StadPlayers/Views/Usuario/nuevacontraseña.php?token=' . $token . '">Aquí<a/>para restaurar tu contraseña ';
                    $message = "Email: " . $email . "\n\n" . " " .  $msg;
                    // $message =  $msg;
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $headers .= "From: " . $email;

                    if (mail($to, $subject, $message, $headers)) {

                        echo  "<div style='color:#00FFFA; margin-left:2%;margin-top:2%'> <strong><h3>se ha enviado un Link de restablecer contraseña a tu correo.<h3></strong></div>";
                    } else {

                        echo "¡Ups! Algo salió mal al enviar, Intenta de Nuevo";
                    }


                    echo "<div style='color:#00FFFA; margin-left:2%;margin-top:2%'> <strong><h3>Has Click <a href='../../Views/Usuario/nuevacontraseña.php?token=$token'>Aquí<a/>para restaurar tu contraseña <h3></strong></div>";
                } else {
                    echo "Usuario No Existe";
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
}