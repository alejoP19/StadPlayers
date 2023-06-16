<?php

require_once("conexionModel.php");

class UsuarioModel
{

    public $email;
    public $nickname;
    public $password;
    public $message;
    public $results;
    private $db;

    public function __construct()
    {
        $this->email;
        $this->nickname;
        $this->password;
        $this->message;
        $this->results;
        //Instanciar la base de datos en el constructor para poder realizar consultas
        $this->db = new Database();
    }


    public function Store($datos)
    {

        try {

            if (!empty($_POST['email']) && !empty($_POST['nickname']) && !empty($_POST['password']) && strlen($_POST['password']) >= 8) {

                $password = md5($_POST['password']);
                $sql = 'INSERT INTO usuarios ( email, nickname,password) VALUES (:email, :nickname, :password)';
                $prepare = $this->db->conect()->prepare($sql);

                $query = $prepare->execute([
                    'email'    => $datos['email'],
                    'nickname' => $datos['nickname'],
                    'password' => $password,
                ]);
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getUser($datos)
    {

        $pass = md5($datos['password']);
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
}
