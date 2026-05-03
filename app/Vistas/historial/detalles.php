<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Entrenamiento - MuscleON</title>
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
                <a href="indice.php?ruta=historial">Historial</a>
                <span>/</span>
                <span>Detalles del entrenamiento</span>
            </nav>
            <div class="entrenamiento-detalles-cabecera">
                <div class="informacion-entrenamiento">
                    <h1><?php echo htmlspecialchars($entrenamiento["rutina_nombre"]);?></h1>
                    <div class="meta-entrenamiento">
                        <span class="fecha-badge">
                            <i class="fas fa-calendar"></i>
                            <?php echo strftime("%d de %B de %Y", strtotime($entrenamiento["fecha"]));?>
                        </span>

                        <span class="tiempo-badge">
                            <i class="fas fa-clock"></i>
                            <?php echo date("H:i", strtotime($entrenamiento["fecha"]));?>
                        </span>

                         <span class="usuario-badge">
                            <i class="fas fa-user"></i>
                            <?php echo htmlspecialchars($entrenamiento["usuario_nombre"])?>
                        </span>

                    </div>
                </div>

                <div class="entrenamiento-acciones">
                    <a href="indice.php?ruta=historial" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Volver
                    </a>
                    <button onclick="window.print()" class="btn btn-info">
                        <i class="fas fa-print"></i>Imprimir
                    </button>

                    <form action="indice.php?ruta=historial_eliminar" method="POST" class="inline-form" onsubmit="return confirm('Estas seguro de que quieres eliminar este entrenamiento?')">
                        <input type="hidden" name="id" value="<?php echo $entrenamiento["id"];?>">
                                                
                        <button type="submit" class="btn btn-sm btn-danger">
                             <i class="fas fa-trash"></i>Eliminar
                        </button>
                    </form>
                </div>

            </div>

             <div class="resumen-entrenamiento">
                <div class="item-resumen">
                    <i class="fas fa-dumbell"></i>
                    <div class="resumen-contenido">
                        <span class="numero-estadistico"><?php echo count($detalles);?></span>
                        <span class="resumen-label">Ejercicios </span>
                    </div>
                    
                </div>

                <div class="item-resumen">
                    <i class="fas fa-fire"></i>
                    <div class="resumen-contenido">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Calorias </span>
                    </div>
                </div>

                <div class="item-resumen">
                    <i class="fas fa-hourglass-half"></i>
                    <div class="resumen-contenido">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Duracion </span>
                    </div>
                </div>

                <div class="item-resumen">
                    <i class="fas fa-trophy"></i>
                    <div class="resumen-contenido">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Intensidad </span>
                    </div>
                </div>


            </div>

            <div class="entrenamiento-contenido">
                <div class="seccion-ejercicio">
                    <h2><i class="fas fa-list-ol"></i> Ejercicios Realizados</h2>
                    
                    <?php if (empty($detalles)): ?>
                        <div class="no-ejercicios">
                            <i class="fas fa-dumbbell"></i>
                            <p>No se registraron detalles específicos de los ejercicios</p>
                            <small>Este entrenamiento fue registrado sin detalles individuales</small>
                        </div>
                    <?php else: ?>
                        <div class="lista-ejercicios">
                            <?php foreach ($detalles as $index => $detalle): ?>
                                <div class="ejercicios-detalle">
                                    <div class="ejercicio-cabecera">
                                        <div class="ejercicio-info">
                                            <h3>
                                                <span class="ejercicio-numero"><?php echo $index + 1; ?></span>
                                                <?php echo htmlspecialchars($detalle['ejercicio_nombre']); ?>
                                            </h3>
                                            <span class="ejercicio-tipo">
                                                <i class="fas fa-crosshairs"></i>
                                                <?php echo htmlspecialchars($detalle['ejercicio_descripcion']); ?>
                                            </span>
                                        </div>
                                        <div class="ejercicio-performance">
                                            <div class="performance-badge completed">
                                                <i class="fas fa-check"></i>
                                                Completado
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="ejercicio-detalle">
                                        <div class="detalle-fila">
                                            <div class="detalle-objeto">
                                                <label>Series Completadas:</label>
                                                <span class="value"><?php echo htmlspecialchars($detalle['series_completadas']); ?></span>
                                            </div>
                                            <div class="detalle-objeto">
                                                <label>Repeticiones:</label>
                                                <span class="value"><?php echo htmlspecialchars($detalle['repeticiones_completadas']); ?></span>
                                            </div>
                                            <div class="detalle-objeto">
                                                <label>Peso Usado:</label>
                                                <span class="value"><?php echo htmlspecialchars($detalle['peso_usado']); ?> kg</span>
                                            </div>
                                        </div>
                                        
                                        <div class="calculo-volumen">
                                            <div class="volumen-objeto">
                                                <label>Volumen Total:</label>
                                                <span class="value highlight">
                                                    <?php 
                                                    $volumen = $detalle['series_completadas'] * $detalle['repeticiones_completadas'] * $detalle['peso_usado'];
                                                    echo number_format($volumen, 2); 
                                                    ?> kg
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="resumen-entrenamiento">
                            <h3><i class="fas fa-chart-bar"></i> Resumen del Entrenamiento</h3>
                            <div class="resumen-plantilla">
                                <div class="resumen-objeto">
                                    <label>Volumen Total:</label>
                                    <span class="value">
                                        <?php 
                                        $volumen_total = 0;
                                        foreach ($detalles as $detalle) {
                                            $volumen_total += $detalle['series_completadas'] * $detalle['repeticiones_completadas'] * $detalle['peso_usado'];
                                        }
                                        echo number_format($volumen_total, 2); 
                                        ?> kg
                                    </span>
                                </div>
                                <div class="resumen-objeto">
                                    <label>Total Series:</label>
                                    <span class="value">
                                        <?php 
                                        $series_total = array_sum(array_column($detalles, 'series_completadas'));
                                        echo $series_total; 
                                        ?>
                                    </span>
                                </div>
                                <div class="resumen-objeto">
                                    <label>Total Repeticiones:</label>
                                    <span class="value">
                                        <?php 
                                        $reps_total = array_sum(array_column($detalles, 'repeticiones_completadas'));
                                        echo $reps_total; 
                                        ?>
                                    </span>
                                </div>
                                <div class="resumen-objeto">
                                    <label>Peso Promedio:</label>
                                    <span class="value">
                                        <?php 
                                        $peso_promedio = count($detalles) > 0 ? array_sum(array_column($detalles, 'peso_usado')) / count($detalles) : 0;
                                        echo number_format($peso_promedio, 2); 
                                        ?> kg
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="seccion-notas">
                    <h2><i class="fas fa-sticky-note"></i> Notas del Entrenamiento</h2>
                    <div class="notas-contenido">
                        <div class="nota">
                            <i class="fas fa-heart"></i>
                            <div class="texto-nota">
                                <strong>Sensación:</strong>
                                <span>Buena energía durante toda la sesión</span>
                            </div>
                        </div>
                        <div class="nota">
                            <i class="fas fa-chart-line"></i>
                            <div class="texto-nota">
                                <strong>Progresión:</strong>
                                <span>+2.5 kg en press de banca respecto a la semana anterior</span>
                            </div>
                        </div>
                        <div class="nota">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div class="texto-nota">
                                <strong>Observaciones:</strong>
                                <span>Liger molestia en hombro derecho, reducir peso en próximos entrenamientos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="seccion-recomendaciones">
                    <h2><i class="fas fa-lightbulb"></i> Recomendaciones para Próxima Sesión</h2>
                    <div class="lista-recomendaciones">
                        <div class="objeto-recomendado">
                            <i class="fas fa-arrow-up"></i>
                            <div class="texto-recomendacion">
                                <strong>Progresión:</strong>
                                <span>Aumentar 2.5 kg en sentadilla si la técnica se mantiene correcta</span>
                            </div>
                        </div>
                        <div class="objeto-recomendado">
                            <i class="fas fa-arrow-down"></i>
                            <div class="texto-recomendacion">
                                <strong>Precaución:</strong>
                                <span>Mantener peso actual en ejercicios de hombro por molestia</span>
                            </div>
                        </div>
                        <div class="objeto-recomendado">
                            <i class="fas fa-plus"></i>
                            <div class="texto-recomendacion">
                                <strong>Nuevo ejercicio:</strong>
                                <span>Incluir elevaciones laterales para trabajar deltoides</span>
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

        function animateValue(element,start,end,duration){
            const range = end-start;
            const increment = range/(duration/16);
            let current = start;
            const timer = setInterval(() => {
                current += increment;
                if(current >= end){
                    current=end;
                    clearInterval(timer);
                }
                element.textContent=Math.floor(current);
            }, 16);
        }

         document.addEventListener('DOMContentLoaded',function(){
            const statNumbers=document.querySelectorAll(".numero-estadistico");
            statNumbers.forEach(stat => {
                const finalValue = stat.textContent;
                if(finalValue!=="--"){
                    animateValue(stat,0,parseInt(finalValue),1000)
                }
            })
        })
    </script>
    <script src="../../publica/js/main.js"></script>
</body>
</html>