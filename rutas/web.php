<?php 
require_once __DIR__ . "/../app/Controladores/UsuarioControlador.php";
require_once __DIR__ . "/../app/Controladores/HistorialControlador.php";
require_once __DIR__ . "/../app/Controladores/RutinaControlador.php";
require_once __DIR__ . "/../app/Controladores/EjercicioControlador.php";
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
    case "historial":
        $controlador = new HistorialControlador();
        $controlador->mostrarLista();
        break;
    case "historial_registrar":
        $controlador = new HistorialControlador();
        $controlador->mostrarFormularioRegistrar($_GET["rutina_id"]?? null);
        break;
    case "historial_guardar":
        $controlador = new HistorialControlador();
        $controlador->registrarEntrenamiento();
        break;
    case "historial_detalles":
        $controlador = new HistorialControlador();
        $controlador->mostrarDetalles($_GET["id"]?? 0);
        break;
    case "historial_estadisticas":
        $controlador = new HistorialControlador();
        $controlador->mostrarEstadisticas();
        break;
    case "rutinas":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Vistas/rutinas.php"
        break;
    case "ejercicios":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Vistas/ejercicios.php"
        break;
    default:
        require_once __DIR__ . "/../app/Vistas/inicio.php"
        break;
}
