<?php

class BaseDeDatos {
    private static $instancia = null;
    private $conexion;

    private function __construct(){
        $host = "localhost";
        $dbname = "muscleon";
        $usuario = "root";
        $password= "";

        try{
            $this->conexion = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                $usuario,
                $password
            );
            $this->conexion->setAtribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Error de conexion: ".$e->getMessage());
        }
    }

    public static function obtenerInstancia(){
        if(self::$instancia === null){
            self::$instancia=new BaseDeDatos();
        }

        return self::$instancia;
    }

    public function obtenerConexion(){
        return $this->conexion;
    }
}