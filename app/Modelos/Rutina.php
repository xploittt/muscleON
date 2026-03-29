<?php
require_once __DIR__ . "/../../configuracion/bbdd.php";
class Rutina {
    private $conexion;

    public function __construct(){
        $this->conexion = BaseDeDatos::obtenerInstancia()->obtenerConexion();
    }

    public function listarPorUsuario($usuarioId){
        $sql = "SELECT *
                FROM rutinas
                WHERE usuario_id=:usuario_id
                ORDER BY created_at DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":usuario_id"=>$usuarioId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($usuarioId, $datos){
        $sql = "INSERT INTO rutinas(usuario_id,nombre,descripcion) 
                VALUES(:usuario_id, :nombre, :descripcion)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":usuario_id"=>$usuarioId,
            ":nombre"=>$datos["nombre"],
            ":descripcion"=>$datos["descripcion"]??null

        ]);
    }

    public function agregarEjercicio($datos){
        $sql = "INSERT INTO rutina_ejercicios(rutina_id, ejercicio_id, series, repeticiones, peso, tiempo_descanso)
                VALUES(:rutina_id, :ejercicio_id, :series, :repeticiones, :peso, :tiempo_descanso)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":rutina_id"=>$datos["rutina_id"],
            ":ejercicio_id"=>$datos["ejercicio_id"],
            ":series"=>$datos["series"],
            ":repeticiones"=>$datos["repeticiones"],
            ":peso"=>$datos["peso"]??null,
            ":tiempo_descanso"=>$datos["tiempo_descanso"]??null
        ]);
    }


    public function ejerciciosDeRutina($rutinaId){
        $sql = "SELECT re.*,e.nombre, e.descripcion, e.grupo_muscular, e.imagen_url
                FROM rutina_ejercicios re
                JOIN ejercicios e ON e.id=re.ejercicio_id
                WHERE re.rutina_id = :rutina_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":rutina_id"=>$rutinaId["rutina_id"],
            
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)
    }

    public function obtenerPorId($id){
        $sql = "SELECT r.*,u.nombre AS usuario_nombre
                FROM rutinas r
                JOIN usuarios u ON r.usuario_id=u.id
                WHERE r.id=:id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerConEjercicios($rutinaId){
        $sql = "SELECT r.*,re.*,e.nombre AS ejercicio_nombre,e.descripcion AS ejercicio_descripcion
                FROM rutinas r
                LEFT JOIN rutina_ejercicios re ON r.id = re.rutina_id
                LEFT JOIN ejercicios e ON re.ejercicio_id = e.id
                WHERE r.id = :rutina_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":rutina_id"=>$rutinaId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($id,$datos){
        $sql = "UPDATE rutinas
                SET nombre= :nombre,
                    descripcion= :descripcion
                WHERE id=:id AND usuario_id= :usuario_id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id,
            ":usuario_id"=>$datos["usuario_id"],
            ":nombre"=>$datos["nombre"],
            ":descripcion"=>$datos["descripcion"]
        ]);
    }


    public function eliminar($id,$usuario_id){
        $sql = "DELETE FROM rutinas
                WHERE id= :id AND usuario_id= :usuario_id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id,
            ":usuario_id"=>$usuario_id
        ]);
    }

    public function eliminarEjercicio($rutinaId,$ejercicioId){
        $sql = "DELETE FROM rutina_ejercicios
                WHERE rutina_id= :rutina_id AND ejercicio_id= :ejercicio_id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":rutina_id"=>$rutinaId,
            ":ejercicio_id"=>$ejercicioId
        ]);
    }

    public function actualizarEjercicio($rutinaId,$ejercicioId,$datos){
        $sql = "UPDATE rutina_ejercicios
                SET series = :series,
                    repeticiones = :repeticiones,
                    peso = :peso,
                    tiempo_descansp = :tiempo_descanso
                WHERE rutina_id = :rutina_id AND ejercicio_id = :ejercicio_id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":rutina_id"=>$rutinaId,
            ":ejercicio_id"=>$ejercicioId,
            ":series"=>$datos["series"],
            ":repeticiones"=>$datos["repeticiones"],
            ":peso"=>$datos["peso"],
            ":tiempo_descanso"=>$datos["tiempo_descanso"]
        ]);
    }
}

