<?php
require_once __DIR__ . "/../Modelo/Ejercicio.php";

class EjercicioControlador {
   public function listar(){
        $modelo=new Ejercicio();
        $ejercicios=$modelos->listar();
        require __DIR__ . "/../Vistas/ejercicios.php";
   } 

   public function guardar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Ejercicio();
            $modelo->crear($_POST);
            header('Location:indice.php?ruta=ejercicios');
            exit();
        }
        header('Location:indice.php?ruta=ejercicios');
        exit();
   }
}