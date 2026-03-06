<?php
require_once "../Modelos/Usuario.php";

class UsuarioControlador {
    public function mostrarFormularioRegistro(){
        require_once "../Vistas/registro.php";
    
    }

    public function mostrarLogin(){
        require_once "../Vistas/login.php"
    }
    

    public function guardar(){
        if($_SERVER["REQUEST_METHOD"]==="POST") {
            $modelo = new Usuario();
            $usuarioExistente = $modelo->buscarPorEmail($_POST["email"]);
            if($usuarioExistente){
                echo "El email ya existe";
                return;
            }
            $modelo->crear($_POST);
            header("Location:indice.php?ruta=login");
            exit();
            
        }
    }

    public function autenticar(){
        if($_SERVER["REQUEST_METHOD"]==="POST") {
            $modelo = new Usuario();
            $usuario = $modelo->verificarCrendenciales($_POST["email"],$_POST["contrasena"]);
            if($usuario){
                $_SESSION["usuario"] = [
                    "id"=>$usuario["id"],
                    "nombre"=>$usuario["nombre"],
                    "tipo"=>$usuario["tipo"]

                ];
                header("Location:indice.php?ruta=dashboard");
                exit();
            }
            echo "Hay algun dato incorrecto!";
        }
    }

    public function logout(){
        session_destroy();
        header("Location:indice.php?ruta=login");
        exit();
    }
}