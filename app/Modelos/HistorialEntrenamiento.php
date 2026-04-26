<?php

require_once __DIR__ . "/../../configuracion/bbdd.php";

class HistorialEntrenamiento {
    private $conexion;

    public function __construct(){
        $this->conexion = BaseDeDatos::obtenerInstancia()->obtenerConexion();
    }

    public function crear($datos){
        $sql = "INSERT INTO historial_entrenamiento
                (usuario_id,rutina_id,fecha)
                VALUES (:usuario_id,:rutina_id,:fecha)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':usuario_id'=>$datos["usuario_id"],
            ':rutina_id'=>$datos["rutina_id"],
            ":fecha"=>$datos["fecha"]
            
        ]);
    }

    public function obtenerPorUsuario($usuario_id,$limite=30){
        $sql = "SELECT he.*,r.nombre AS rutina_nombre
                    FROM historial_entrenamiento he
                    JOIN rutinas r ON he.rutina_id=r.id
                    WHERE he.usuario_id =:usuario_id
                    ORDER BY he.fecha DESC
                    LIMIT :limite";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":usuario_id"=>$usuario_id,
            ":limite"=>$limite
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function obtenerPorId($id){
        $sql = "SELECT he.*,r.nombre AS rutina_nombre,u.hombre AS usuario_nombre
                    FROM historial_entrenamiento he
                    JOIN rutinas r ON he.rutina_id=r.id
                    JOIN usuarios u ON he.usuario_id = u.id
                    WHERE he.id =:id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerPorEstadisticas($usuario_id, $dias=30){
        $sql = "SELECT COUNT(*) AS total_entrenamientos
                    SUM(CASE WHEN DATE(fecha)=CURDATE() THEN 1 ELSE 0 END) AS hoy,
                    SUM(CASE WHEN DATE(fecha)>=DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN 1 ELSE 0 END) AS ultima_semana,
                    SUM(CASE WHEN DATE(fecha)>=DATE_SUB(CURDATE(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) AS ultimo_mes
                FROM historial_entrenamiento
                WHERE usuario_id = :usuario_id
                AND DATE(fecha)>=DATE_SUB(CURDATE(), INTERVAL :dias DAY)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":usuario_id"=>$usuario_id,
            ":dias"=>$dias
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerProgresoSemanal($usuario_id){
        $sql = "SELECT DATE(fecha) AS fecha, COUNT(*) AS entrenamientos_dia
                    FROM historial_entrenamiento
                    WHERE usuario_id = :usuario_id
                    AND DATE(fecha)>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                    GROUP BY DATE(fecha)
                    ORDER BY fecha";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":usuario_id"=>$usuario_id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function eliminar($id,$usuario_id){
        $sql = "DELETE FROM historial_entrenamiento
                    WHERE id =:id AND usuario_id = :usuario_id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id,
            ":usuario_id"=>$usuario_id
        ]);
    }



    public function registrarDetalles($historial_id, $detalles){
        $sql = "INSERT INTO historial_entrenamiento_detalles
                (historial_entrenamiento_id, ejercicio_id, series_completadas, repeticiones_completadas, peso_usado)
                VALUES (:historial_entrenamiento_id,:ejercicio_id,:series_completadas,:repeticiones_completadas,:peso_usado)";

        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":historial_entrenamiento_id"=>$historial_id,
            ":ejercicio_id"=>$detalles["ejercicio_id"],
            ":series_completadas"=>$detalles["series_completadas"],
            ":repeticiones_completadas"=>$detalles["repeticiones_completadas"],
            ":peso_usado"=>$detalles["peso_usado"]
        ]);
    }


    public function obtenerDetalles($historial_id){
        $sql = "SELECT hed.*,e.nombre AS ejercicio_nombre
                    FROM historial_entrenamiento_detalles hed
                    JOIN ejercicios e ON hed.ejercicio_id = e.id
                    WHERE hed.historial_entrenamiento_id = :historial_entrenamiento_id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":historial_entrenamiento_id"=>$historial_id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}