<?php 
require_once __DIR__ . "/../../configuracion/bbdd.php";

class Dieta{
    private $conexion;
    public function __construct(){
        $this->conexion= BaseDeDatos::obtenerInstancia()->obtenerConexion();

    }

    public function listar(){
        $sql= "SELECT * FROM dietas ORDER BY titulo";
        return $this->conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function crear($datos){
        $sql= "INSERT INTO dietas(titulo,descripcion,imagen_url)
                VALUES(:titulo, :descripcion, :imagen_url)";
        $stmt=$this->conexion->prepare($sql);
        return $stmt->execute([
            ":titulo"=>$datos["titulo"],
            ":descripcion"=>$datos["descripcion"] ?? null,
            ":imagen_url"=>$datos["imagen_url"] ?? null
        ]);
    }

    public function obtenerPorId($id){
        $sql= "SELECT * FROM dietas WHERE id = :id";
        $stmt=$this->conexion->prepare($sql);
        $stmt->execute([":id"=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $datos){
        $sql= "UPDATE dietas
                SET titulo = :titulo,
                    descripcion = :descripcion,
                    imagen_url= :imagen_url
                WHERE id=:id";
        $stmt=$this->conexion->prepare($sql);
        return $stmt->execute([
            ":titulo"=>$datos["titulo"],
            ":descripcion"=>$datos["descripcion"] ?? null,
            ":imagen_url"=>$datos["imagen_url"] ?? null,
            ":id"=>$id
        ]);
    }

    public function eliminar($id){
        $sql = "DELETE FROM dietas WHERE id = :id";
        $stmt=$this->conexion->prepare($sql);
        return $stmt->execute([
            ":id"=>$id
        ]);
    }
}

?>