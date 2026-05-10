<?php require_once __DIR__ . "/../../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($dieta["titulo"]);?> - MuscleON</title>
    <link rel="stylesheet" href="/muscleON/publica/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="cabecera-interna">
        <nav class="barra-navegacion">
            <div class="contenedor-navegacion">
                <div class="logo">
                    <i class="fas fa-dumbbell"></i>
                    <span>MuscleON</span>
                </div>
                 <div class="enlaces-navegacion">
                    <a href="indice.php?ruta=inicio">Inicio</a>
                    <a href="indice.php?ruta=ejercicios">Ejercicios</a>
                    <a href="indice.php?ruta=rutinas">Rutinas</a>
                    <a href="indice.php?ruta=dietas">Dietas</a>
                    <a href="indice.php?ruta=historial">Historial</a>
                    <a href="indice.php?ruta=logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="contenido-principal"> 
        <div class="contenedor">
            <div class="cabecera-pagina">
                <h1><i class="fas fa-apple-alt"></i><?= htmlspecialchars($dieta["titulo"])?></h1>
            </div>
            
            <div class="detalle-contenedor">
                <?php if($dieta["imagen_url"]):?>
                    <div class="detalle-imagen">
                        <img src="<?php htmlspecialchars($dieta["imagen_url"]);?>" alt="<?php htmlspecialchars($dieta["titulo"]);?>">
                    </div>
                <?php endif;?>
                <div class="detalle-informacion">
                    <h2>Descripcion</h2>
                    <div class="detalle-descripcion">
                        <?= nl2br(htmlspecialchars($dieta["descripcion"]?? "No hay descripcion disponible"))?>
                    </div>
                </div>

            </div>
           
            
            <div class="acciones-detalle">
                <a href="indice.php?ruta=editar_dieta&id=<?= $dieta["id"]?>" class="boton boton-primario">
                    <i class="fas fa-edit"></i>Editar Dieta
                </a>

                <a href="indice.php?ruta=dietas" class="boton boton-secundario">
                    <i class="fas fa-arrow-left"></i>Volver al Listado
                </a>

                <a href="indice.php?ruta=eliminar_dieta&id=<?= $dieta["id"]?>" class="boton boton-peligro" onclick="return confirm('Estas seguro de que quieres eliminar esta dieta?')">
                    <i class="fas fa-trash"></i>Eliminar Dieta
                </a>

            </div>
        </div>
    </main>
    <footer class="pie-pagina">
        <div class="contenedor">
            <div class="pie-contenido">
                <div class="pie-seccion">
                    <div class="logo">
                        <i class="fas fa-dumbbell"></i>
                        <span>muscleON</span>
                    </div>
                    <p>Tu compañero ideal en el viaje hacia un estilo de vida mas saludable y fuerte</p>
                    <div class="social-links">
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="pie-seccion">
                    <h4>Enlaces Rapidos</h4>
                    <ul>
                        <li>
                            <a href="indice.php?ruta=inicio">Inicio</a>
                        </li>

                        <li>
                            <a href="indice.php?ruta=registro">Registro</a>
                        </li>

                        <li>
                            <a href="indice.php?ruta=login">Iniciar Sesion</a>
                        </li>

                        <li>
                            <a href="#caracteristicas">Caracteristicas</a>
                        </li>
                    </ul>
                </div>    

                <div class="pie-seccion">
                    <h4>Soporte</h4>
                    <ul>
                        <li>
                            <a href="#">Ayuda</a>
                        </li>

                        <li>
                            <a href="#">Contacto</a>
                        </li>

                        <li>
                            <a href="#">Privacidad</a>
                        </li>

                        <li>
                            <a href="#">Terminos</a>
                        </li>

                    </ul>
                </div>

                <div class="pie-seccion">
                    <h4>Contacto</h4>
                    <p><i class="fas fa-envelope"></i>info@muscleon.com</p>
                    <p><i class="fas fa-phone"></i>661 46 14 45</p>
                    <p><i class="fas fa-map-marker-alt"></i>Bilbao, España</p>

                </div>


            </div>

            <div class="pie-inferior">
                <p>&copy; 2026 muscleON. Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
    <script>
        <?php if(isset($_GET["mensaje"])):?>
            showNotification('<?php echo htmlspecialchars($_GET["mensaje"]);?>','success');
        <?php endif;?>

        <?php if(isset($_GET["error"])):?>
            showNotification('<?php echo htmlspecialchars($_GET["error"]);?>','error');
        <?php endif;?>

    </script>
    <script src="../../publica/js/main.js"></script>
</body>
</html>