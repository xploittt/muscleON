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
        $sql = "SELECT re.*,e.nombre AS ejercicio_nombre
                FROM rutina_ejercicios re
                JOIN ejercicios e ON e.id=re.ejercicio_id
                WHERE re.rutina_id = :rutina_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":rutina_id"=>$rutinaId["rutina_id"],
            
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)
    }
}

