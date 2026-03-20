<?php 
require_once __DIR__ . "/../app/Controladores/UsuarioControlador.php";
require_once __DIR__ . "/../app/SoftwareIntermedio/AuthMiddleware.php";

$ruta = $_GET["ruta"] ?? "inicio";
$controlador = new UsuarioControlador();

$rutas = [
    "inicio" => function () {
        require_once __DIR__ . "/../app/Vistas/inicio.php";
    },
    "registro" => function () use($controlador) { 
        $controlador->mostrarFormularioRegistro();
    },
    "guardar_usuario" => function () use($controlador) {
        $controlador->guardar();
    },
    "login" => function () use($controlador) {
        $controlador->mostrarLogin();
    },
    "autenticar" => function () use($controlador) {
        $controlador->autenticar();
    },
    "logout" => function () use($controlador) {
        $controlador->logout();
    }
]