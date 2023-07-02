<?php

require_once '../Models/EstadisticasModel.php';
// require 'ruta_a_phpmailer/PHPMailerAutoload.php';
$estadistica = new EstadisticasController;

class EstadisticasController
{
    private $estadistica;

    public function __construct()
    {
        session_start();
        $this->estadistica = new EstadisticasModel();

        if (isset($_REQUEST['c'])) {
            switch ($_REQUEST['c']) {
                case 1:
                    self::store();
                    break;
                case 2:
                    self::update();
                    break;
                case 3:
                    self::stad();
                    break;
                case 4:
                    self::delete();
                    break;
                case 5:
                    self::config();
                    break;
                case 6:
                    self::borrar();
                    break;
                case 7:
                    self::deletepa();
                    break;
                case 8:
                    self::deleteli();
                    break;
                case 9:
                    self::deletequi();
                    break;
                case 10:
                    self::deleteco();
                    break;



                default:
                    self::index();
                    break;
            }
        }
    }



    public function index()
    {
        return $this->estadistica->getAll();
    }

    public function config()
    {
        $equipo = $_POST['agre_equipo'];
        $copa = $_POST['agre_copa'];
        $pais = $_POST['agre_pais'];
        $liga = $_POST['agre_liga'];
        $tipoPartido = $_POST['agre_tipo_partido'];

        // Verificar que al menos un campo tenga valor
        if (empty($equipo) && empty($copa) && empty($pais) && empty($liga) && empty($tipoPartido)) {
            echo "Error: Debe completar al menos un campo.";
            return;
        }

        // Realizar la inserción en la tabla correspondiente
        if (!empty($equipo)) {
            $this->estadistica->configEquipo($equipo);
        }
        if (!empty($copa)) {
            $this->estadistica->configCopa($copa);
        }
        if (!empty($pais)) {
            $this->estadistica->configPais($pais);
        }
        if (!empty($liga)) {
            $this->estadistica->configLiga($liga);
        }
        if (!empty($tipoPartido)) {
            $this->estadistica->configTipoPartido($tipoPartido);
        }

        header("Location: ../Views/Configuraciones/index.php");
        exit();
    }



    public function store()
    {

        // $id = new EstadisticasModel(); 
        //  $usuario = $id->getById();
        $usuario = $_SESSION['id'];
        $datos = [

            'id_jugador'        => $_REQUEST['id_jugador'],
            'fecha_del_partido' => $_REQUEST['fecha_del_partido'],
            'id_tipo_partido'   => $_REQUEST['id_tipo_partido'],
            'id_equipo'         => $_REQUEST['id_equipo'],
            'numero_partido'    => $_REQUEST['numero_partido'],
            'id_usuario'        => $usuario,

        ];
        $result = $this->estadistica->store($datos);

        if ($result) {
            header("Location: ../Views/Estadisticas/LlenarEstadistica.php");
            exit();
        }

        return $result;
    }

    public function stad()
    {

        $datos = [
            'nombre' => $_REQUEST['nombre'],
            'descripcion' => $_REQUEST['descripcion'],
            'tipo'         => $_REQUEST['tipo']
        ];

        $result = $this->estadistica->stad($datos);

        if ($result) {
            header("Location: ../Views/Estadisticas/LlenarEstadistica.php");
            exit();
        }

        return $result;
    }



    public function update()
    {
        $datos = [
            'id'     => $_REQUEST['id'],
            'valor'  => $_REQUEST['valor'],
        ];

        $result = $this->estadistica->update($datos);

        if ($result) {
            echo json_encode(array('success' => 1, 'valor' => $datos['valor']));
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->delete($id);
        if ($result) {
            header("Location: ../Views/Estadisticas/VerEstadisticas.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }
    }

    public function borrar()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->borrar($id);
        if ($result) {
            header("Location: ../Views/Configuraciones/verTipoPartido.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }
    }

    public function deletepa()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->deletepa($id);
        if ($result) {
            header("Location: ../Views/Configuraciones/verPaises.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }
    }

    public function deleteli()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->deleteli($id);
        if ($result) {
            header("Location: ../Views/Configuraciones/verLiga.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }
    }

    public function deletequi()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->deletequi($id);
        if ($result) {
            header("Location: ../Views/Configuraciones/verEquipos.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }
    }

    public function deleteco()
    {
        $id = $_REQUEST['id'];
        // var_dump($_REQUEST);
        // die();
        $result = $this->estadistica->deleteco($id);
        if ($result) {
            header("Location: ../Views/Configuraciones/verCopas.php");
            exit();
        } else {
            echo "No se pudo eliminar la estadistica, !Intentalo nuevamente";
        }

    }


    
}