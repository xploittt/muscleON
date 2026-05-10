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
        $controlador = new RutinaControlador();
        $controlador->listar();
        break;
    case "guardar_rutina":
        AuthMiddleware::verificar();
        $controlador = new RutinaControlador();
        $controlador->guardar();
        break;
    case "editar_rutina":
        AuthMiddleware::verificar();
        $controlador = new RutinaControlador();
        $controlador->mostrarFormularioEditar($_GET["id"] ?? 0);
        break;
     case "actualizar_rutina":
        AuthMiddleware::verificar();
        $controlador = new RutinaControlador();
        $controlador->actualizar($_GET["id"] ?? 0);
        break;
    case "ejercicios":
        AuthMiddleware::verificar();
        $controlador = new EjercicioControlador();
        $controlador->listar();
        break;
    case "guardar_ejercicio":
        AuthMiddleware::verificar();
        $controlador = new EjercicioControlador();
        $controlador->crear();
        break;
    case "actualizar_ejercicio":
        AuthMiddleware::verificar();
        $controlador = new EjercicioControlador();
        $controlador->actualizar();
        break;
    case "editar_ejercicio":
        AuthMiddleware::verificar();
        $controlador = new EjercicioControlador();
        $controlador->mostrarFormularioEditar($_GET["id"] ?? 0);
        break;
    case "dietas":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->listar();
        break;
    case "crear_dieta":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->mostrarFormularioCrear();
        break;
    case "guardar_dieta":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->crear();
        break;
    case "dieta_detalles":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->mostrarDetalles($_GET["id"] ?? 0);
        break;
    case "editar_dieta":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->mostrarFormularioEditar($_GET["id"] ?? 0);
        break;
    case "actualizar_dieta":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->actualizar($_GET["id"] ?? 0,$_POST);
        break;
    case "eliminar_dieta":
        AuthMiddleware::verificar();
        require_once __DIR__ . "/../app/Controladores/DietaControlador.php";
        $controlador= new DietaControlador();
        $controlador->eliminar($_GET["id"] ?? 0);
        break;
    default:
        require_once __DIR__ . "/../app/Vistas/inicio.php";
        break;
}
