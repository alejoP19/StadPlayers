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
        // var_dump($datos);
        // die();

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


    public function getById($id)
    {
        $resultado = [];

        try {
            $sql = "SELECT email, nickname, password
                FROM usuarios
                WHERE id = :id";

            $query = $this->db->conect()->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = new UsuarioModel();
                $item->email = $row['email'];
                $item->nickname = $row['nickname'];
                $item->password = $row['password'];

                array_push($resultado, $item);
            }

            return $resultado;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
    

// lalocadekevin@gmail.com