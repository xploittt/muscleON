<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($ejercicio["nombre"]);?> - MuscleON</title>
    <link rel="stylesheet" href="../../publica/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="barra-navegacion">
            <div class="contenedor-navegacion">
                <div class="nav-logo">
                    <i class="fas fa-dumbbell"></i>
                    <span>MuscleON</span>
                </div>
                <ul class="enlaces-navegacion">
                    <li><a href="indice.php?ruta=inicio">Inicio</a></li>
                    <li><a href="indice.php?ruta=ejercicios" class="active">Ejercicios</a></li>
                    <li><a href="indice.php?ruta=rutinas">Rutinas</a></li>
                    <li><a href="indice.php?ruta=dietas">Dietas</a></li>
                    <li><a href="indice.php?ruta=dashboard">Dashboard</a></li>
                    <li><a href="indice.php?ruta=logout">Logout</a></li>
                </ul>
                <div class="hamburguer">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>
    <main class="main-content"> 
        <div class="contenedor">
            <nav class="breadcrumb">
                <a href="indice.php?ruta=ejercicios">Ejercicios</a>
                <span>/</span>
                <span><?php echo htmlspecialchars($ejercicio["nombre"]);?></span>
            </nav>
            <div class="ejercicio-detalle">
                <div class="ejercicio-header">
                    <div class="ejercicio-image-large">
                        <?php if($ejercicio["imagen_url"]):?>
                            <img src="<?php echo htmlspecialchars($ejercicio["imagen_url"]);?>" alt="<?php echo htmlspecialchars($ejercicio["nombre_url"]);?>">
                        <?php else:?>
                            <div class="placeholder-image-large">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                        <?php endif;?>


                    </div>
                    <div class="ejercicio-info">
                        <h1><?php echo htmlspecialchars($ejercicio["nombre"]);?></h1>
                        <div class="ejercicio-meta">
                            <span class="grupo-muscular-badge">
                                <i class="fas fa-crosshairs"></i>
                                <?php echo htmlspecialchars($ejercicio["grupo_muscular"]);?>
                            </span>

                            <span class="dificultad-badge"></span>

                        </div>
                        <div class="ejercicio-acciones">
                            <a href="indice.php?ruta=ejercicios" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>Volver
                            </a>
                            <?php if(isset($_SESSION["usuario"])&& $_SESSION["usuario"]["tipo"]==="admin"):?>
                                <a href="indice.php?ruta=ejercicio_editar&id=<?php echo $ejercicio["id"];?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="indice.php?ruta=ejercicio_eliminar" method="POST" class="inline-form"
                                    onsubmit="return confirm('Estas seguro de eliminar este ejercicio?')">
                                
                                    <input type="hidden" name="id" value="<?php echo $ejercicio["id"];?>">

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Eliminar
                                    </button>
                                </form>
                            <?php endif;?>
                        </div>
                    </div>
                </div>

                <div class="contenido-ejercicio-secciones">
                    <div class="ejercicio-descripcion">
                        <h2><i class="fas fa-info-circle"></i> Descripción</h2>
                        <p><?php echo nl2br(htmlspecialchars($ejercicio['descripcion'])); ?></p>
                    </div>

                    <div class="ejercicio-instrucciones">
                        <h2><i class="fas fa-list-ol"></i> Instrucciones</h2>
                        <ol>
                            <li>Calienta adecuadamente antes de comenzar el ejercicio</li>
                            <li>Mantén una postura correcta durante toda la ejecución</li>
                            <li>Respira correctamente: exhala en el esfuerzo, inhala en la relajación</li>
                            <li>Realiza el movimiento de forma controlada y sin rebotes</li>
                            <li>Descansa entre series según tu nivel de condición física</li>
                        </ol>
                    </div>

                    <div class="ejercicio-tips">
                        <h2><i class="fas fa-lightbulb"></i> Consejos y Recomendaciones</h2>
                        <div class="tips-grid">
                            <div class="tip-card">
                                <i class="fas fa-check-circle"></i>
                                <h3>Postura Correcta</h3>
                                <p>Mantén la espalda recta y los abdominales contraídos</p>
                            </div>
                            <div class="tip-card">
                                <i class="fas fa-check-circle"></i>
                                <h3>Rango de Movimiento</h3>
                                <p>Completa todo el rango de movimiento sin forzar las articulaciones</p>
                            </div>
                            <div class="tip-card">
                                <i class="fas fa-check-circle"></i>
                                <h3>Progresión</h3>
                                <p>Comienza con poco peso y aumenta gradualmente</p>
                            </div>
                            <div class="tip-card">
                                <i class="fas fa-check-circle"></i>
                                <h3>Descanso</h3>
                                <p>Permite tiempo suficiente para la recuperación muscular</p>
                            </div>
                        </div>
                    </div>

                    <?php if($ejercicio["video_url"]):?>
                        <div class="ejercicio-video">
                            <h2><i class="fas fa-video"></i>Video Tutorial</h2>
                            <div class="video-contenedor">
                                <iframe src="<?php echo htmlspecialchars($ejercicio["video_url"]);?>" frameborder="0"
                                    allowfullscreen
                                    title="Video Tutorial de <?php echo htmlspecialchars($ejercicio["nombre"]);?>">
                                </iframe>
                            </div>
                        </div>

                    <?php endif;?>

                    <div class="ejercicios-similares">
                        <h2><i class="fas fa-thumbs-up"></i> Ejercicios Similares</h2>
                        <div class="related-grid">
                            <div class="related-card">
                                <div class="related-image">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h3>Press de Banca</h3>
                                <span>Pecho</span>
                                <a href="#" class="btn btn-sm btn-primary">Ver</a>
                            </div>
                            <div class="related-card">
                                <div class="related-image">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h3>Flexiones</h3>
                                <span>Pecho</span>
                                <a href="#" class="btn btn-sm btn-primary">Ver</a>
                            </div>
                            <div class="related-card">
                                <div class="related-image">
                                    <i class="fas fa-dumbbell"></i>
                                </div>
                                <h3>Dips</h3>
                                <span>Pecho</span>
                                <a href="#" class="btn btn-sm btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
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