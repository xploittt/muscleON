<?php 
require_once __DIR__ . "/../app/Controladores/UsuarioControlador.php";
require_once __DIR__ . "/../app/SoftwareIntermedio/AuthMiddleware.php";

$ruta = $_GET["ruta"] ?? "inicio";
$controlador = new UsuarioControlador();
switch($ruta){
    case "inicio":
        require_once __DIR__ . "/../app/Vistas/inicio.php";
        break;
    case "registro":
        $controlador->mostrarFormularioRegistro();
        break;
    case "guardar_usuario":
        $controlador->guardar();
        break;
    case "login":
        $controlador->mostrarLogin();
        break;
    case "autenticar":
        $controlador->autenticar();
        break;
    case "dashboard":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Vistas/dashboard.php";
        break;
    case "logout":
        $controlador->logout();
        break;
    default:
        echo "Esta pagina no se ha encontrado";
}