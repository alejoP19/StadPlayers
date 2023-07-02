<?php

require_once '../Models/UsuarioModel.php';


//Instanciando la clase CalculadoraController
$usuario = new UsuarioController();

class UsuarioController
{
  private $usuarioModel;
  public $email;
  public $DbEmail;
  public function __construct()
  {

    $this->usuarioModel = new UsuarioModel();
    $this->email;
    $this->DbEmail;

    if (isset($_REQUEST['c'])) {
      $controlador = $_REQUEST['c'];
      switch ($controlador) {
        case 1: //Store
          self::Store();
          break;
        case 2: //Eliminar
          // self::destroy();

          break;
        case 3: //Ver por operacion
          // self::recuperarContraseña();
          break;
        case 4:
          // self::update();
          break;
        case 5:
          self::InciarSesion();
          break;
        case 6:
          self::CerrarSesion();
          break;
      }
    }
  }
  public function Store()
  {

    $datos = [
      'email' => $_REQUEST['email'],
      'nickname' => $_REQUEST['nickname'],
      'password' => $_REQUEST['password'],
    ];

    $result =  $this->usuarioModel->Store($datos);

    return $result;
  }

  public function InciarSesion()
  {

    $datos = [
      'email'     => $_REQUEST['email'],
      'password'  => $_REQUEST['password'],
    ];



    // var_dump($datos);
    // die();

    // echo "<hr>";


    if (empty($datos['email']) || empty($datos['password'])) {
    } else {

      $results = $this->usuarioModel->getUser($datos);

      if ($results) {
        session_start();

        $_SESSION['id']       = $results->id;
        $_SESSION['email']    = $results->Email;

        header('Location: ../Views/main/MenuPrincipal.php');
      } else {

        echo " <div style='color:red'> <strong><h1>¡Ups! Algo salió mal.<h1></strong></div>" . '<br>' . '<br>';
        echo "<div style='color:green'> <strong><h1>¡El correo o Contraseña son Incorrectos<h1></strong></div>." . '<br>' . '<br>';
        echo "<div style='color:blue'> <strong><h1>¡Quizas el Usuario no existe, Haz Click en crear Usuario.<h1></strong></div>" . '<br>' . '<br>';
      }
    }
  }


  public function cerrarSesion()
  {
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../index.php');

    // error_reporting(0);

  }

  // public function recuperarContraseña()
  // {

  //   $data = implode(",", $_POST);
  //   if (empty($data)) {
  //     echo "Campo vacio";
  //   } else {
  //     $email = $data;
  //     $result =  $this->usuarioModel->getEmail($email);
  //   }
  // }
}