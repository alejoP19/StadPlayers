<?php

require_once("conexionModel.php");

class UsuarioModel
{
    public $id;
    public $email;
    public $emailToken;
    public $DbEmail;
    public $nickname;
    public $password;
    public $message;
    public $results;
    public $token;
    public $myEmail;
    private $db;

    public function __construct()
    {
        $this->email;
        $this->emailToken;
        $this->nickname;
        $this->password;
        $this->message;
        $this->results;
        $this->DbEmail;
        $this->token;
        $this->myEmail;
        //Instanciar la base de datos en el constructor para poder realizar consultas
        $this->db = new Database();
    }


    public function Store($datos)
    {

        try {
            $password = md5($_POST['password']);

            $sql = 'INSERT INTO usuarios ( email, nickname,password) VALUES (:email, :nickname, :password)';
            $prepare = $this->db->conect()->prepare($sql);

            $query = $prepare->execute([
                'email'    => $datos['email'],
                'nickname' => $datos['nickname'],
                'password' => $password,
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getUser($datos)
    {

        $pass = md5($datos['password']);
        // $pass = ($datos['password']);
        try {

            $sql = 'SELECT id, Email, password FROM usuarios WHERE Email = :email AND password = :password';

            $query = $this->db->conect()->prepare($sql);
            $query->bindParam(':email', $datos['email']);
            $query->bindParam(':password', $pass);
            $query->execute();

            $results = $query->fetchObject();

            return $results;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $items = [];

        try {
            $sql = 'SELECT u.id, u.email, u.nickname, u.password
            FROM usuarios u';

            $query  = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                       =   new UsuarioModel();
                $item->id                   =  $row['id'];
                $item->email                =  $row['email'];
                $item->nickname             =  $row['nickname'];
                $item->password             =  $row['password'];


                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // public function getEmail($email)
    // {
    //     $this->email = $email;
    //     try {
    //         $sql = 'SELECT * FROM usuarios WHERE Email = :email';
    //         $query = $this->db->conect()->prepare($sql);

    //         $query->bindParam(':email', $this->email);
    //         $query->execute();
    //         $results = $query->fetchObject();

    //         if ($results) {
    //             $token = uniqid(md5(time()));
    //             $inser_query = "INSERT INTO olvido_password(email,token) VALUES('$this->email','$token')";
    //             $res  = $this->db->conect()->query($inser_query);


    //             $to = $email;
    //             $subject = "Link de Recuperar contraseña";
    //             $msg = 'Has Click <a href="http://localhost/stadPlayers/index.php/Views/Usuario/nuevacontraseña.php?token=' . $token . '">Aquí<a/>para restaurar tu contraseña ';
    //             $message = "Email:" . $email . "\n\n" . " " . $msg;
    //             $headers = "MIME-version:1.0" . "\r\n";
    //             $headers .= 'content-type: text/html; charset =UTF-8' . "\r\n";
    //             $headers .= "from" . $email;

    //             if (mail($to, $subject, $message, $headers)) {
    //                 echo "se ha enviado un Link de restablecer contraseña a tu correo";
    //             } else {
    //                 echo "¡Ups! Algo salió mal al enviar, Intenta de Nuevo";
    //             }

    //             echo "Has Click <a href='../../Views/Usuario/nuevacontraseña.php?token=$token'>Aquí<a/>para restaurar tu contraseña ";
    //         } else {

    //             echo "Usuario No Existe";
    //         }


    //             echo "Has Click <a href='../../Views/Usuario/nuevacontraseña.php?token=$token'>Aquí<a/>para restaurar tu contraseña ";
    //         } else {

    //             echo "Usuario No Existe";
    //         }
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
}









    

    

// lalocadekevin@gmail.com