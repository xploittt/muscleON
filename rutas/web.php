<?php 
require_once __DIR__ . "/../app/Controladores/UsuarioControlador.php";
require_once __DIR__ . "/../app/SoftwareIntermedio/AuthMiddleware.php";

$ruta = $_GET["ruta"] ?? "inicio";

switch($ruta){
    case "inicio":
        require_once __DIR__ . "/../app/Vistas/inicio.php";
        break;
    case "registro":
        $controlador = new UsuarioControlador();
        $controlador->mostrarFormularioRegistro();
        break;
    case "guardar_usuario":
        $controlador = new UsuarioControlador();
        $controlador->guardar();
        break;
    case "login":
        $controlador = new UsuarioControlador();
        $controlador->mostrarLogin();
        break;
    case "autenticar":
        $controlador = new UsuarioControlador();
        $controlador->autenticar();
        break;
    case "dashboard":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Vistas/dashboard.php";
        break;
    case "logout":
        $controlador = new UsuarioControlador();
        $controlador->logout();
        break;
}
