<?php
class AuthMiddleware{
    public static function verificar(){
        if(!isset($_SESSION["usuario"])){
            header("Location:indice.php?ruta=login");
            exit();
        }
    }
}