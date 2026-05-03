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
        ]);

        
    }
    public function obtenerPorId($id){
        $sql = "SELECT *
                FROM ejercicios
                WHERE id=:id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorGrupoMuscular($grupo){
        $sql = "SELECT *
                FROM ejercicios
                WHERE grupo_muscular=:grupo
                ORDER BY nombre";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":grupo"=>$grupo
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);        
    }

    public function buscar($termino){
        $sql = "SELECT *
                FROM ejercicios
                WHERE nombre LIKE :termino
                OR descripcion LIKE :termino
                OR grupo_muscular LIKE :termino
                ORDER BY nombre";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ":termino"=>"%$termino%"
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($id,$datos){
        $sql = "UPDATE ejercicios
                SET nombre= :nombre,
                    descripcion= :descripcion,
                    grupo_muscular= :grupo_muscular,
                    imagen_url= :imagen_url,
                    video_url= :video_url
                WHERE id= :id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id,
            ":nombre"=>$datos["nombre"],
            ":descripcion"=>$datos["descripcion"],
            ":grupo_muscular"=>$datos["grupo_muscular"],
            ":imagen_url"=>$datos["imagen_url"] ??null,
            ":video_url"=>$dataos["video_url"] ??null
        ]);
    }

    public function eliminar($id){
        $sql = "DELETE FROM  ejercicios
                WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id
        ]);
    }


    public function obtenerGruposMusculares(){
        $sql = "SELECT DISTINCT grupo_muscular
                FROM ejercicios";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

}