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
            $datos = [
                "nombre"=>$_POST["nombre"],
                "descripcion"=>$_POST["descripcion"]
            ];
            $id=$modelo->crear($datos);
            if($id){
                header("Location:indice.php?ruta=rutinas&mensaje=Rutina Creada Correctamente");
            }else{
                header("Location:indice.php?ruta=rutinas&error=Error al crear la rutina");
            }
           
            exit();
        }
        
        
    }

    public function mostrarFormularioEditar($id){
        $modelo= new Rutina();
        $rutina = $modelo->obtenerPorId($id);
        if(!$rutina){
            header("Location:indice.php?ruta=rutinas");
            exit();
        }
        $ejerciciosPorRutina=$modelo->ejerciciosDeRutina($id);
        require __DIR__ . "/../Vistas/rutinas/editar.php";
    }

    public function actualizar($id){
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $modelo = new Rutina();
            $datos = [
                "nombre"=>$_POST["nombre"],
                "descripcion"=>$_POST["descripcion"]
            ];
            
            if($modelo->actualizar($id, $datos)){
                header("Location:indice.php?ruta=rutinas&mensaje=Rutina actualizada exitosamente");
            }else{
                header("Location:indice.php?ruta=rutinas&error=Error al actualizar la rutina");
            }
           
            exit();
        }
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