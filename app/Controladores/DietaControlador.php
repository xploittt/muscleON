<?php 
require_once __DIR__ . "/../Modelos/Dieta.php";

class DietaControlador{
    public function listar(){
        $modelo = new Dieta();
        $dietas = $modelo->listar();
       require_once __DIR__ . "/../Vistas/dietas.php";
    }

    public function mostrarDetalles($id){
        $modelo= new Dieta();
        $dieta = $modelo->obtenerPorId($id);
        if(!$dieta){
            header("Location:indice.php?ruta=dietas");
            exit();
        }
        require_once __DIR__ . "/../Vistas/dietas/detalles.php";
    }

    public function mostrarFormularioCrear(){
        require_once __DIR__ . "/../Vistas/dietas/crear.php";
    }

    public function mostrarFormularioEditar($id){
        $modelo = new Dieta();
        $dieta = $modelo->obtenerPorId($id);
        if(!$dieta){
            header("Location:indice.php?ruta=dietas");
            exit();
        }
        require_once __DIR__ . "/../Vistas/dietas/editar.php";

    }

    public function crear(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Dieta();
            $modelo->crear($_POST);
            header("Location:indice.php?ruta=dietas");
            exit();
        }
    }

     public function actualizar($id){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new Dieta();
            $modelo->actualizar($id, $_POST);
            header("Location:indice.php?ruta=dietas");
            exit();
        }
    }

     public function eliminar($id){
        $modelo = new Dieta();
        $modelo->eliminar($id);
        header("Location:indice.php?ruta=dietas");
        exit();
        
    }
}


?>