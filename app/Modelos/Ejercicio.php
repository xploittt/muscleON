<?php
require_once __DIR__ . "/../../configuracion/bbdd.php";
class Ejercicio {
    private $conexion;

    public function __construct(){
        $this->conexion = BaseDeDatos::obtenerInstancia()->obtenerConexion();
    }

    public function listar(){

        $sql = "SELECT *
                FROM ejercicios
                ORDER BY nombre";
        return $this->conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($datos){

        $sql = "INSERT INTO ejercicios(nombre, descripcion, grupo_muscular, imagen_url, video_url)
                VALUES (:nombre, :descripcion, :grupo_muscular, :imagen_url, :video_url)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":nombre"=>$datos["nombre"],
            ":descripcion"=>$datos["descripcion"],
            ":grupo_muscular"=>$datos["grupo_muscular"],
            ":imagen_url"=>$datos["imagen_url"] ??null,
            ":video_url"=>$datos["video_url"] ??null
        ])

        
    }
    
}