<?php
include_once __DIR__ . '../../Config/config_example.php';
include_once dirname(__FILE__) . '../../Config/rutas.php';
require_once("conexionModel.php");


session_start();

class  ReportesModel
{

    private $db;
    public $id;
    public $id_reporte;
    public $id_usuario;
    public $id_jugador;
    public $nombre_completo;
    public $fechaInicial;
    public $fechaFinal;
    public $apodo;
    public $equipo;
    public $liga;
    public $posicion;
    public $minutos_jugados;
    public $partidos_jugados;
    public $total_minutos;
    public $TotalPromedio;

    public $totalEstadisticasPre;
    public $totalEstadisticasPortero;
    public $id_posicion;
    public $nuevas_estadisticas;
    public $datos;

    public $valor;


    public function __construct()
    {
        //Instanciar la base de datos en el constructor para poder realizar consultas


        $this->db = new Database();

        $this->id;
        $this->id_usuario;
        $this->id_reporte;
        $this->id_jugador;
        $this->nombre_completo;
        $this->fechaInicial;
        $this->fechaFinal;
        $this->apodo;
        $this->equipo;
        $this->liga;
        $this->posicion;
        $this->minutos_jugados;
        $this->partidos_jugados;
        $this->total_minutos;
        $this->TotalPromedio;
        $this->totalEstadisticasPre;
        $this->totalEstadisticasPortero;
        $this->id_posicion;
        $this->nuevas_estadisticas;
        $this->datos;
        // $this->numEstadistica;
        $this->valor;
    }





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
    }

    public function getPlayers()
    {
        $this->id_usuario = $_SESSION['id'];
        $sql = "SELECT id, nombre_completo, id_usuario FROM jugadores WHERE id_usuario ='$this->id_usuario'";
        try {
            $items = [];
            $query = $this->db->conect()->query($sql);
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
    public function getAll()
    {
        $this->id_usuario = $_SESSION['id'];
        $sql = "SELECT gr.id, gr.fecha_inicial, gr.fecha_final, j.nombre_completo
        FROM generar_reporte as gr
        JOIN jugadores as j ON gr.id_jugador = j.id
        WHERE gr.id_usuario ='$this->id_usuario'";

        try {
            $items = [];
            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                // var_dump($row);
                // die();
                $item = new ReportesModel();
                $item->id = $row['id'];
                $item->fechaInicial = $row['fecha_inicial'];
                $item->fechaFinal = $row['fecha_final'];
                array_push($items, $item);
                $item->nombre_completo = $row['nombre_completo'];
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

    public function destroy($id)

    {
        $getall = new reportesModel();
        $getall->getAll();

        if ($getall) {

            try {
                $sql = "DELETE FROM generar_reporte WHERE id=$id";
                $prepare = $this->db->conect()->prepare($sql);
                $query = $prepare->execute([]);


                if ($query) {
                    return true;
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
    public function getReporteId($id)
    {
        $this->id_usuario = $_SESSION['id'];
        $sql = "SELECT * 
        FROM generar_reporte 
        WHERE id = $id AND id_usuario='$this->id_usuario'";

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
        $sql = "SELECT gr.id, gr.fecha_inicial, gr.fecha_final, j.nombre_completo, j.apodo, e.equipo,l.nombre,p.descripcion, p.id AS id_posicion
                FROM generar_reporte as gr 
                JOIN jugadores as j ON gr.id_jugador = j.id
                JOIN equipos as e ON  j.id_equipo = e.id
                JOIN ligas as l ON  j.id_liga = l.id
                JOIN posiciones as p ON  j.id_posicion = p.id
                WHERE gr.id = $datosJugador
";
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
                $item->id_posicion      = $row['id_posicion'];
            }
            return $item;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getTotalMinutos($totalMinutosJugados)
    {
        try {
            $sql = "SELECT  SUM(valor) AS min_jugados
            FROM estadisticas_count  AS ec
            JOIN estadisticas_encuentro AS ee 
            ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = ?
            WHERE id_estadistica = ? AND ee.fecha_del_partido BETWEEN ? AND ?
            ";
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                $totalMinutosJugados->id_jugador,
                9,
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
            ]);
            $result = $query->fetchColumn();
            $total_partidos = ($result > 0) ? $result : 0;
            return  $total_partidos;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function promedio($promedio)
    {

        try {
            $params = [];
            #Trae las estadísticas del jugador tipo otro y predeterminadas mayores a 0
            $sql = "SELECT ROUND(AVG(valor),2) AS promedio
            FROM estadisticas_count ec
            WHERE ec.valor > 0 AND ec.id_estadistica != 9 AND
            id_encuentro_estadistica 
            IN (SELECT id 
            FROM estadisticas_encuentro as ee 
            WHERE  ee.id_jugador = ? AND ee.fecha_del_partido BETWEEN ? AND ?
            )";

            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                $promedio->id_jugador,
                $promedio->fechaInicial,
                $promedio->fechaFinal,
            ]);
            $result = $query->fetchColumn();
            $TotalPromedio = ($result > 0) ? $result : 0;
            // var_dump($TotalPromedio);
            // die();
            return  $TotalPromedio;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTotalEstadPre($totalEstadisticasPre)
    {
        try {
            $params = [];
            #Trae las estadísticas del jugador tipo otro y predeterminadas mayores a 0
            $sql = "SELECT e.nombre, SUM(ec.valor) AS valor
            FROM estadisticas AS e
            RIGHT JOIN estadisticas_count AS ec ON e.id = ec.id_estadistica
            JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id 
            AND ee.id_jugador = ?
            WHERE ee.fecha_del_partido BETWEEN ? AND ? AND tipo = 0 AND valor > 0 AND e.predeterminada = 1 AND ec.id_estadistica != 9
            GROUP BY e.nombre, e.id";

            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                $totalEstadisticasPre->id_jugador,
                $totalEstadisticasPre->fechaInicial,
                $totalEstadisticasPre->fechaFinal,
            ]);
            while ($row = $query->fetchObject()) {
                // var_dump($row);
                // die();
                $params["pre_" . $row->nombre] =  $row->valor;
            }
            return $params;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getTotalEstadPortero($totalEstadisticasPortero)
    {
        try {
            $params = [];
            #Trae las estadísticas del jugador tipo portero y predeterminadas mayores a 0
            $sql = " SELECT e.nombre, SUM(ec.valor) AS valor
            FROM estadisticas AS e
            RIGHT JOIN estadisticas_count AS ec ON e.id = ec.id_estadistica
            JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = ?
            WHERE ee.fecha_del_partido BETWEEN ? AND ?
            AND tipo = 1 AND valor > 0 AND e.predeterminada = 1 AND ec.id_estadistica != 9 
            GROUP BY e.nombre, e.id";

            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                $totalEstadisticasPortero->id_jugador,
                $totalEstadisticasPortero->fechaInicial,
                $totalEstadisticasPortero->fechaFinal,
            ]);
            while ($row = $query->fetchObject()) {
                $params["por_" . $row->nombre] =  $row->valor;
            }
            return $params;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getNuevaEstadistica($nuevasEstadisticas)
    {
        try {
            $params = [];
            $sql = "SELECT e.nombre, SUM(ec.valor) AS valor
            FROM estadisticas AS e
            RIGHT JOIN estadisticas_count AS ec ON e.id = ec.id_estadistica
            JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id AND ee.id_jugador = ?
            WHERE ee.fecha_del_partido BETWEEN ? AND ?
            AND valor > 0 AND e.predeterminada = 0 AND ec.id_estadistica != 9 
            GROUP BY e.nombre, e.id";
            $query = $this->db->conect()->prepare($sql);
            $query->execute([
                $nuevasEstadisticas->id_jugador,
                $nuevasEstadisticas->fechaInicial,
                $nuevasEstadisticas->fechaFinal,
            ]);
            while ($row = $query->fetchObject()) {
                $params["nueva_" . $row->nombre] =  $row->valor;
            }
            return $params;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
