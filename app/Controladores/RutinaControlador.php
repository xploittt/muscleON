<?php
require_once __DIR__ . "/../Modelos/Rutina.php";
require_once __DIR__ . "/../Modelos/Ejercicio.php";

class RutinaControlador {
    public function listar(){
        $modelo = new Rutina();
        $ejercicioModelo = new Ejercicio();
        $rutinas = $modelo->listarPorUsuario($_SESSION["usuario"]["id"]);
        $ejercicios = $ejercicioModelo->listar();
        $ejerciciosPorRutina = [];
        foreach($rutinas as $r){
            $ejerciciosPorRutina[$r["id"]] = $modelo->ejerciciosDeRutina($r["id"]);
        }
        require __DIR__ . "/../Vistas/rutinas.php";
    }

    public function guardar(){
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $modelo = new Rutina();
            $modelo->crear($_SESSION["usuario"]["id"],$_POST);
            header("Location:indice.php?ruta=rutinas");
            exit();
        }
        header("Location:indice.php?ruta=rutinas");
        exit();
    }


    public function agregarEjercicio(){
        if($_SERVER["REQUEST_METHOD"]=== "POST"){

            $modelo = new Rutina();
            $modelo->agregarEjercicio($_POST);
            header("Location:indice.php?ruta=rutinas");
            exit(); 
        }
        header("Location:indice.php?ruta=rutinas");
        exit(); 
    }
}