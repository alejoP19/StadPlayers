<?php

require_once __DIR__ . '../../config/config_example.php';
require_once 'conexionModel.php';



class EstadisticasModel extends stdClass
{


    public $id;
    public $id_usuario;
    public $nombre;
    public $numero_partido;
    public $valor;
    public $nombre_completo;
    public $nombre_jugador;
    public $fecha_del_partido;
    public $tipo;
    public $nombre_tipo_partido;
    public $equipo;
    private $db;


    public function __construct()
    {
        $this->db = new DataBase();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAll()
    {
        $items = [];

        try {

            $sql = 'SELECT ec.id AS id, e.nombre, ec.valor
            FROM estadisticas_count AS ec
            JOIN estadisticas AS e ON e.id = ec.id_estadistica';

            $query  = $this->db->conect()->query($sql);

            while ($registro = $query->fetch()) {
                $item         = new EstadisticasModel();
                $item->id     = $registro['id'];
                $item->nombre = $registro['nombre'];
                $item->valor  = $registro['valor'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    
    

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }



    public function getPlayers()
    {
        $items = [];

        try {
            $sql = 'SELECT id, nombre_completo FROM jugadores';

            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item       = new  EstadisticasModel();
                $item->id   = $row['id'];
                $item->nombre_completo = $row['nombre_completo'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    public function  getEquipo()
    {
        return $this->equipo;
    }



    public function equipos()
    {
        $items = [];

        try {
            $sql = 'SELECT id, equipo FROM equipos';
            $query = $this->db->conect()->query($sql);
            while ($row = $query->fetch()) {
                $item           = new EstadisticasModel();
                $item->id       = $row['id'];
                $item->equipo   = $row['equipo'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function estado()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function getTipoPartido()
    {
        return $this->nombre;
    }



    public function TipoPartido()
    {
        $items = [];

        try {
            $sql = 'SELECT id, nombre FROM tipo_partido';
            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item            = new EstadisticasModel();
                $item->id        = $row['id'];
                $item->nombre    = $row['nombre'];
                
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    public function getNumeroPartido()
    {
        return $this->num_partido;
    }



    public function NumeroPartido()
    {
        $items = [];
        try {
            $sql = 'SELECT id, num_partido FROM numero_partido';
            $query = $this->db->conect()->query($sql);

            while ($row = $query->fetch()) {
                $item                = new EstadisticasModel();
                $item->id            = $row['id'];
                $item->num_partido   = $row['num_partido'];
                
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException  $e) {
            die($e->getMessage());
        }
    }

    public function verStad()
    {
        $items = [];

        try {
            $sql = 'SELECT ee.id, ee.fecha_del_partido, tp.nombre AS nombre_tipo_partido, j.nombre_completo AS nombre_jugador, eq.equipo, np.num_partido
            FROM estadisticas_encuentro AS ee
            JOIN tipo_partido AS tp ON ee.id_tipo_partido = tp.id
            JOIN jugadores AS j ON ee.id_jugador = j.id
            JOIN equipos AS eq ON ee.id_equipo = eq.id
            JOIN numero_partido AS np ON ee.numero_partido = np.id ';
            $query = $this->db->conect()->query($sql);

            while ($registro = $query->fetch()) {
                $item = new EstadisticasModel();
                $item->id = $registro['id'];
                $item->nombre_jugador = $registro['nombre_jugador'];
                $item->fecha_del_partido = $registro['fecha_del_partido'];
                $item->equipo = $registro['equipo'];
                $item->nombre_tipo_partido = $registro['nombre_tipo_partido'];
                $item->num_partido = $registro['num_partido'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function verValores($id)
    {
        $items = [];

        try {
            $sql = "SELECT j.nombre_completo AS nombre_jugador, es.nombre AS nombre, ec.valor
            FROM estadisticas_count AS ec
            JOIN estadisticas AS es ON ec.id_estadistica = es.id
            JOIN estadisticas_encuentro AS ee ON ec.id_encuentro_estadistica = ee.id
            JOIN jugadores AS j ON ee.id_jugador = j.id
            WHERE ee.id = $id";

            $query = $this->db->conect()->query($sql);

            while ($registro = $query->fetch()) {
                $item           = new EstadisticasModel();
                $item->nombre   = $registro['nombre'];
                $item->valor    = $registro['valor'];
                $item->nombre_jugador   = $registro['nombre_jugador'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function store($datos)
    {
        $fecha_del_partido = $datos['fecha_del_partido'];
        $tipo_partido      = $datos['id_tipo_partido'];
        $jugador           = $datos['id_jugador'];
        $equipo            = $datos['id_equipo'];
        $numero_partido    = $datos['numero_partido'];
        $id_usuario        = $_SESSION['id'];

        try {
            $sql = "INSERT INTO estadisticas_encuentro (fecha_del_partido, id_tipo_partido, id_jugador, id_equipo, numero_partido, id_usuario) VALUES (:fecha_del_partido, :id_tipo_partido, :id_jugador, :id_equipo, :numero_partido, :id_usuario)";

            $connection = $this->db->conect();
            $prepare = $connection->prepare($sql);
            $prepare->execute([
                'fecha_del_partido' => $fecha_del_partido,
                'id_tipo_partido'   => $tipo_partido,
                'id_jugador'        => $jugador,
                'id_equipo'         => $equipo,
                'numero_partido'    => $numero_partido,
                'id_usuario'    => $id_usuario
            ]);

            $lastId = $connection->lastInsertId();
            $this->storeEstadisticasCount($lastId);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function stad($datos)
    {
        try {
            $id_posicion = 'SELECT id_posicio FROM jugadores ';

            if ($id_posicion != 1) {
                $tipo = 0;
            } else {
                $tipo = 1;
            }
            $sql = "INSERT INTO estadisticas (nombre, descripcion, predeterminada, tipo) VALUES (:nombre, :descripcion, :predeterminada, :tipo) ";

            $connection = $this->db->conect();
            $prepare = $connection->prepare($sql);
            $prepare->execute([
                'nombre' => $datos['nombre'],
                'descripcion' => $datos['descripcion'],
                'predeterminada' => 0,
                'tipo' => $tipo
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getLastId()
    {
        try {
            // Obtener el último id insertado
            $lastId = $this->db->conect()->lastInsertId();
            return $lastId;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function storeEstadisticasCount($lastId)
    {
        try {

            $id_posicion = $this->db->conect()->query("SELECT id_posicion FROM estadisticas_encuentro AS ee JOIN jugadores AS j ON j.id = ee.id_jugador WHERE ee.id = $lastId")->fetchColumn();

            if ($id_posicion != 1) {
                $sqlSelect = 'SELECT id, tipo FROM estadisticas WHERE tipo = 0';
            } else {
                $sqlSelect = 'SELECT id, tipo FROM estadisticas ORDER BY tipo DESC, id ASC';
            }



            $sqlInsert = 'INSERT INTO estadisticas_count (id_encuentro_estadistica, id_estadistica) VALUES (?, ?)';

            // Obtener los datos de la tabla estadisticas
            $querySelect = $this->db->conect()->query($sqlSelect);
            $items = $querySelect->fetchAll(PDO::FETCH_ASSOC);

            // Insertar los datos en la tabla estadisticas_count
            $Insert = $this->db->conect()->prepare($sqlInsert);
            foreach ($items as $item) {
                $Insert->execute([
                    $lastId,
                    $item['id']
                ]);
            }

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUltimasEstadisticas()
    {
        $items = [];

        try {


            $sql = 'SELECT ec.id AS id, e.nombre, e.tipo, ec.valor 
                    FROM estadisticas_count AS ec
                    JOIN estadisticas AS e ON e.id = ec.id_estadistica
                    -- JOIN jugadores AS j ON j.id = ec.jugador_id
                    WHERE ec.id_encuentro_estadistica = (SELECT MAX(id) FROM estadisticas_encuentro) 
                    ';



            $query = $this->db->conect()->prepare($sql);

            $query->execute();

            while ($registro = $query->fetch()) {
                $item         = new EstadisticasModel();
                $item->id     = $registro['id'];
                $item->nombre = $registro['nombre'];
                $item->valor  = $registro['valor'];
                $item->tipo   = $registro['tipo'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    function obtenerJugadorId($nombreJugador)
    {
        try {
            $sql = 'SELECT id_posicion FROM jugadores WHERE nombre = :nombre';

            $query = $this->db->conect()->prepare($sql);
            $query->execute(['nombre' => $nombreJugador]);

            $resultado = $query->fetch();

            if ($resultado) {
                return $resultado['id_posicion'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }



    public function update($datos)
    {

        try {
            $sql = 'UPDATE estadisticas_count SET valor = :valor WHERE id = :id';

            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'    => $datos['id'],
                'valor' => $datos['valor'],
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function delete($id)
    {
        try { 


            $sql = "DELETE FROM estadisticas_encuentro WHERE id = :id";
            $prepare = $this->db->conect()->prepare($sql);
            $query = $prepare->execute([
                'id'   => $id,
            ]);

            if ($query) {
                return true;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
