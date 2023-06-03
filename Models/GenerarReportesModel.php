<?php
include_once __DIR__ . '../../Config/config_example.php';
include_once dirname(__FILE__) . '../../Config/rutas.php';
require_once("conexionModel.php");

session_start();

class ReportesModel
{

    public $id;
    public $nombre_completo;
    public $id_usuario;
    public $fechaInicial;
    public $fechaFinal;
    public $id_reporte;
    public $apodo;
    public $equipo;
    public $liga;
    public $posicion;
    public $minutos_jugados;
    public $partidos_jugados;
    public $total_minutos;
    public$totalEstadisticas;
    public $pases_acertados;
    public $pases_errados;
    public $tiros_al_arco;
    public $id_jugador;
    public $datos;
    public $numEstadistica;
    private $db;

    public function __construct()
    {
        //Instanciar la base de datos en el constructor para poder realizar consultas

        $this->db = new Database();


        $this->id_usuario = $_SESSION['id'];
        $this->fechaInicial;
        $this->fechaFinal;
        $this->id_reporte;
        $this->apodo;
        $this->equipo;
        $this->liga;
        $this->posicion;
        $this->minutos_jugados;
        $this->partidos_jugados;
        $this->total_minutos;
        $this->numEstadistica;
        $this->totalEstadisticas;
        $this->pases_acertados;
        $this->pases_errados;
        $this->tiros_al_arco;
    }
    //metodos mágicos
    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }




    //Metodos propios
    public function getById()
    {
        $this->id_usuario = $_SESSION['id'];
        return $this->id_usuario; # code...
    }

    public function getAll()
    {

        $sql = 'SELECT gr.id, gr.fecha_inicial, gr.fecha_final, j.nombre_completo
        FROM generar_reporte as gr
        JOIN jugadores as j ON gr.id_jugador = j.id
        WHERE gr.id_usuario =' . $this->id_usuario;

        try {
            $items = [];
            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item = new ReportesModel();
                $item->id = $row['id'];
                $item->fechaInicial = $row['fecha_inicial'];
                $item->fechaFinal = $row['fecha_final'];
                $item->nombre_completo = $row['nombre_completo'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function store($datos)
    {
        $sql = 'INSERT INTO generar_reporte(fecha_inicial, fecha_final, id_jugador, id_usuario)
                     VALUES(:fechaInicial, :fechaFinal, :id_jugador, :id_usuario)';

        try {
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'fechaInicial' => $_REQUEST['fechaInicial'],
                'fechaFinal' => $_REQUEST['fechaFinal'],
                'id_jugador' => $_REQUEST['id_jugador'],
                'id_usuario' => $_SESSION['id'],

            ]);


            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getReporteId($id)
    {
        $sql = "SELECT * 
        FROM generar_reporte 
        WHERE id = $id AND id_usuario =$this->id_usuario";

        try {
            $items = [];
            $query = $this->db->conect()->query($sql);
            while ($row = $query->fetchObject()) {
                $item               = new ReportesModel();
                $item->id           = $row->id;
                $item->fechaInicial = $row->fecha_inicial;
                $item->fechaFinal   = $row->fecha_final;
                $item->id_jugador   = $row->id_jugador;
            }


            return $item;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function DatosJugadorReporte($datosJugador)
    {

        $sql = "SELECT gr.id, gr.fecha_inicial, gr.fecha_final, j.nombre_completo, j.apodo, e.equipo,l.nombre,p.descripcion
            FROM generar_reporte as gr 
            JOIN jugadores as j ON gr.id_jugador = j.id
            JOIN equipos as e ON  j.id_equipo = e.id
            JOIN ligas as l ON  j.id_liga = l.id
            JOIN posiciones as p ON  j.id_posicion = p.id
            WHERE gr.id = $datosJugador";

        try {

            $query = $this->db->conect()->query($sql);
            while ($row = $query->fetch()) {
                $item                   = new ReportesModel();
                $item->id               = $row['id'];
                $item->nombre_completo  = $row['nombre_completo'];
                $item->apodo            = $row['apodo'];
                $item->equipo           = $row['equipo'];
                $item->liga             = $row['nombre'];
                $item->posicion         = $row['descripcion'];
            }

            return $item;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getTotalMinutos($totalMinutosJugados)
    {


        try {
            $sql = "SELECT SUM(valor) AS min_jugados
            FROM estadisticas_count  AS ec
            JOIN estadisticas_encuentro AS ee 
            ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = ?
            WHERE id_estadistica = ? AND ee.fecha_del_partido BETWEEN ? AND ?
            ";

            $query = $this->db->conect()->prepare($sql);

            $query->execute([

                $totalMinutosJugados->id_jugador,
                15,
                $totalMinutosJugados->fechaInicial,
                $totalMinutosJugados->fechaFinal
                //  1, 15, "2017-01-01", "2017-12-31"

            ]);

            $result = $query->fetchColumn();
            $total_minutos = ($result > 0) ? $result : 0;

            return $total_minutos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getTotalPartidos($totalPartidosJugados)
    {


        try {
            $sql = "SELECT COUNT(*) AS total_partidos
            FROM estadisticas_encuentro  AS ee
            WHERE ee.id_jugador=? 
            AND ee.fecha_del_partido BETWEEN ? AND ?
            ";

            $query = $this->db->conect()->prepare($sql);

            $query->execute([

                $totalPartidosJugados->id_jugador,

                $totalPartidosJugados->fechaInicial,
                $totalPartidosJugados->fechaFinal,

                //  1, 15, "2017-01-01", "2017-12-31"


            ]);

            $result = $query->fetchColumn();
            $total_partidos = ($result > 0) ? $result : 0;

            return  $total_partidos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTotalEstadisticas($totalEstadisticas)
    {
        try {
            $sql = "SELECT e.nombre, SUM(ec.valor)
             FROM estadisticas AS e
             RIGHT JOIN estadisticas_count AS ec ON e.id = ec.id_estadistica
             JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = ?
             WHERE ee.fecha_del_partido BETWEEN ? AND ?
             GROUP BY e.nombre, e.id
            ";

            $query = $this->db->conect()->prepare($sql);

            $query->execute([
                $totalEstadisticas->id_jugador,
                $totalEstadisticas->fechaInicial,
                $totalEstadisticas->fechaFinal
            ]);
            $result = $query->fetchObject(); 
            // var_dump($result);
            // die();
            // if ($result) {
            //     $items = [];
            //     while ($row = $query->fetchObject()) {
            //         $item               = new ReportesModel();
            //         $item->pases_acertados  = $row->pases_acertados;
            //         $item->pases_errados = $row->pases_errados;
            //         $item->tiros_al_arco   = $row->tiros_alrco ;
                
         
            //     }
            
            // }
            return  $result;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        }

    



    public function getPlayers()
    {


        $sql = "SELECT id, nombre_completo FROM jugadores WHERE id_usuario = $this->id_usuario";
        $query = $this->db->conect()->query($sql);

        try {
            $items = [];
            while ($row = $query->fetch()) {
                $item = new ReportesModel();
                $item->id = $row['id'];
                $item->nombre_completo = $row['nombre_completo'];
                $item->id_usuario = $this->id_usuario;

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


// CONSULTA SUMAR TODAS LAS ESTADISTICAS
// SELECT e.nombre, SUM(ec.valor)
//  FROM estadisticas AS e
//  RIGHT JOIN estadisticas_count AS ec ON e.id = ec.id_estadistica
//  JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = 1
//  WHERE ee.fecha_del_partido BETWEEN "2017-01-01-" AND "2017-12-31"
//  GROUP BY e.nombre, e.id