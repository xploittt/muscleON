<?php

require_once __DIR__ . "/../Modelos/HistorialEntrenamiento.php";
require_once __DIR__ . "/../SoftwareIntermedio/AuthMiddleware.php";
require_once __DIR__ . "/../../configuracion/bbdd.php"

class HistorialControlador {
    public function mostrarLista(){
        AuthMiddleware::verificar();
        $usuario_id = $_SESSION["usuario"]["id"];
        $modelo = new HistorialEntrenamiento();
        $historial = $modelo->obtenerPorUsuario($usuario_id);
        require_once __DIR__ . "/../Vistas/historial/lista.php";
    }

    public function mostrarDetalles($id){
        AuthMiddleware::verificar();
        $modelo = new HistorialEntrenamiento();
        $entrenamiento = $modelo->obtenerPorId($id);

        if (!$entrenamiento || $entrenamiento["usuario_id"]!=$_SESSION["usuario"]["id"]){
            header("Location: indice.php?ruta=historial");
            exit();
        }

        $detalles = $modelo ->obtenerDetalles($id);
        require_once __DIR__ . "/../Vistas/historial/detalles.php";
    }


    public function mostrarEstadisticas(){
        AuthMiddleware::verificar();
        $usuario_id = $_SESSION ["usuario"]["id"];
        $modelo = new HistorialEntrenamiento();
        $estadisticas = $modelo->obtenerPorEstadisticas($usuario_id);
        $progreso_semanal = $modelo->obtenerProgresoSemanal($usuario_id);

        require_once __DIR__ . "/../Vistas/historial/estadisticas.php";
    }


    public function registrarEntrenamiento(){
        AuthMiddleware::verificar();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new HistorialEntrenamiento();
            $datos = [
                "usuario_id"=>$_SESSION["usuario"]["id"],
                "rutina_id"=>$_POST["rutina_id"],
                "fecha"=>date("Y-m-d H:i:s")
            ];
            if($modelo->crear($datos)){
                $bbdd = BaseDeDatos::obtenerInstancia();
                $historial_id = $bbdd->obtenerConexion()->lastInsertId();
                if(isset($_POST["ejercicios"])&& is_array($_POST["ejercicios"])){
                    foreach($_POST["ejercicios"] as $ejercicio_id=>$detalle){
                        $detalle_datos = [
                            "ejercicio_id"=>$ejercicio_id,
                            "series_completadas"=>$detalle["series_completadas"],
                            "repeticiones_completadas"=>$detalle["repeticiones_completadas"],
                            "peso_usado"=>$detalle["peso_usado"]
                        ];
                        $modelo -> registrarDetalles($historial_id, $detalle_datos);
                    }
                }
                header("Location:indice.php?ruta=historial&mensaje=Entrenamiento Registrado EXITOSAMENTE");
                exit();
            }else{
                $error= "Error al registrar el entrenamiento";
                require_once __DIR__ . "/../Vistas/historial/registrar.php";
            }
        }
    }


    public function eliminar(){
        AuthMiddleware::verificar();
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $modelo = new HistorialEntrenamiento();
            $usuario_id = $_SESSION["usuario"]["id"];
            if($modelo->eliminar($_POST["id"],$usuario_id)){
                header("Location:indice.php?ruta=historial&mensaje=Registro eliminado EXITOSAMENTE");
                exit();
            }else{
                header("Location:indice.php?ruta=historial&error=Error al eliminar el registro");
                exit();
            }
        }
    }


    public function mostrarFormularioRegistrar($rutina_id=null){
        AuthMiddleware::verificar();
        if($rutina_id){
            require_once __DIR__ . "/../Modelos/Rutina.php";
            $rutina_modelo=new Rutina();
            $rutina=$rutina_modelo->obtenerPorId($rutina_id);
            $ejercicios = $rutina_modelo->ejerciciosDeRutina($rutina_id);
        }else{
            $rutina=null;
            $ejercicios=[];
        }
        require_once __DIR__ . "/../Vistas/historial/registrar.php";
    }
}