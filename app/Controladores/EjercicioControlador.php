<?php
require_once __DIR__ . "/../Modelo/Ejercicio.php";

class EjercicioControlador {
   public function listar(){
        $modelo=new Ejercicio();
        $ejercicios=$modelos->listar();
        $grupos = $modelo->obtenerGruposMusculares();
        require_once __DIR__ . "/../Vistas/ejercicios.php";
   } 

   public function mostrarDetalles($id){
        $modelo = new Ejercicio();
        $ejercicio = $mdoelo->obtenerPorId($id);
        if(!$ejercicio){
            header('Location:indice.php?ruta=ejercicios');
            exit();
        }
        require_once __DIR__ . "/../Vistas/ejercicios/detalles.php";
   }


   public function mostrarFormularioCrear(){
        require_once __DIR__ . "/../Vistas/ejercicios/crear.php";
   }

   public function mostrarFormularioEditar($id){
        $modelo = new Ejercicio();
        $ejercicio = $mdoelo->obtenerPorId($id);
        if(!$ejercicio){
            header('Location:indice.php?ruta=ejercicios');
            exit();
        }
        require_once __DIR__ . "/../Vistas/ejercicios/editar.php";
   }

   public function crear(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Ejercicio();
            $datos = [
                "nombre"=>$_POST["nombre"],
                "descripcion"=>$_POST["descripcion"],
                "grupo_muscular"=>$_POST["grupo_muscular"],
                "imagen_url"=>$_POST["imagen_url"] ??null,
                "video_url"=>$_POST["video_url"] ??null

            ];
            if($modelo->crear($datos)){
                header('Location:indice.php?ruta=ejercicios&mensaje=Ejercicio creado exitosamente');
                exit();
            } else{
                $error = "Error al crear el ejercicio";
                require_once __DIR__ . "/../Vistas/ejercicios/crear.php";
            }
            
        }
        
   }

   public function actualizar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Ejercicio();
            $datos = [
                "nombre"=>$_POST["nombre"],
                "descripcion"=>$_POST["descripcion"],
                "grupo_muscular"=>$_POST["grupo_muscular"],
                "imagen_url"=>$_POST["imagen_url"] ??null,
                "video_url"=>$_POST["video_url"] ??null

            ];
            if($modelo->actualizar($_POST["id"], $datos)){
                header('Location:indice.php?ruta=ejercicios&mensaje=Ejercicio actualizado exitosamente');
                exit();
            } else{
                $error = "Error al actualizar el ejercicio";
                require_once __DIR__ . "/../Vistas/ejercicios/editar.php";
            }
            
        }
       
   }


      public function eliminar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Ejercicio();
         
            if($modelo->eliminar($_POST["id"])){
                header('Location:indice.php?ruta=ejercicios&mensaje=Ejercicio eliminado exitosamente');
                exit();
            } else{
                 header('Location:indice.php?ruta=ejercicios&mensaje=Error al eliminar el ejercicio');
                exit();
            }
            
        }
        
   }

   public function buscar(){
        if(isset($_GET["termino"])){
            $modelo = new Ejercicio();
            $ejercicios = $modelo->buscar($_GET["termino"]);
            require_once __DIR__ . "/../Vistas/ejercicios/busqueda.php";
        }
   }

   public function obtenerPorGrupo(){
        if(isset($_GET["grupo"])){
            $modelo = new Ejercicio();
            $ejercicios = $modelo->obtenerPorGrupoMuscular($_GET["grupo"]);
            require_once __DIR__ . "/../Vistas/ejercicios/grupo.php";
        }
        
   }
}