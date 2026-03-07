<?php

require_once "../../configuracion/bbdd.php";

class Usuario{
    private $conexion;

    public function __construct(){
        $this->conexion = BaseDeDatos::obtenerInstancia()->obtenerConexion();
    }

    public function crear($datos){
        $sql = "INSERT INTO usuarios
                (nombre, apellidos, email, contrasena_hasheada)
                VALUES (:nombre, :apellidos, :email, :contrasena)";

        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':nombre' =>$datos["nombre"],
            ':apellidos' =>$datos["apellidos"],
            ':email' =>$datos["email"],
            ':contrasena' => password_hash($datos["contrasena"],PASSWORD_BCRYPT)
        ]);
    }

    public function buscarPorEmail($email){
        $sql = "SELECT *
                FROM usuarios
                WHERE email = :email";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([
            ':email' =>$email
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function verificarCredenciales($email, $password){
        $usuario = $this->buscarPorEmail($email);
        if($usuario && password_verify($password, $usuario["contrasena_hasheada"])){
            return $usuario;
        }
        return false;
    }
}