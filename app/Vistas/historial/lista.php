<?php require_once __DIR__ . "/../../SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Entrenamiento - MuscleON</title>
    <link rel="stylesheet" href="/muscleON/publica/css/estilos.css">
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

    <main class="contenido-principal">
        <div class="contenedor">
            <div class="cabecera-pagina">
                <h1><i class="fas fa-history"></i> Historial de Entrenamiento</h1>
                <p>Registro completo de tus entrenamientos</p>
            </div>

            <div class="historial-controls">
                <div class="descripcion-estadisticas">
                    <div class="estadistica-indi">
                        <i class="fas fa-calendar-check"></i>
                        <div class="info-estadisticas">
                            <span class="numero-estadistica">
                                <?php echo count($historial);?>
                            </span>
                            <span class="label-estadistica">Entrenamientos</span>
                        </div>
                    </div>
                    <div class="estadistica-indi">
                        <i class="fas fa-fire"></i>
                        <div class="info-estadisticas">
                            <span class="numero-estadistica">
                                <?php
                                $semana_actual = 0;
                                $semana_pasada = date("Y-m-d",strtotime("-7 days"));
                                foreach($historial as $h){
                                    if($h["fecha"]>=$semana_pasada) $semana_actual++;
                                }

                                echo $semana_actual;

                                ?>
                            </span>
                            <span class="estadistica-label">Esta semana</span>
                        </div>
                        <div class="estadistica-indi">
                            <i class="fas fa-trophy"></i>
                            <div class="info-estadisticas">
                                <span class="numero-estadistica">
                                    <?php
                                        $mes_actual = 0;
                                        $mes_pasado = date("Y-m-d",strtotime("-30 days"));
                                        foreach($historial as $h){
                                            if($h["fecha"]>=$mes_pasado) $mes_actual++;
                                        }

                                        echo $mes_actual;

                                    ?>
                                </span>
                                <span class="estadistica-label">Este mes</span>
                            </div>
                            
                        </div>

                        <div class="botones-acciones">
                            <a href="indice.php?ruta=historial_registrar" class="btn btn-primary">
                                <i class="fas fa-plus"></i>Registrar entrenamiento
                            </a>
                            
                            <a href="indice.php?ruta=historial_estadisticas" class="btn btn-secondary">
                                <i class="fas fa-chart-line"></i>Ver estadisticas
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="seccion-filtro">
                <div class="control-filtro">
                    <div class="grupo-filtro">
                        <label for="filtro-periodo">Periodo:</label>
                        <select name="periodo" id="filtro-periodo" class="form-control" onchange="filtrarPeriodo()">
                            <option value="">Todos</option>
                            <option value="7">Ultimos 7 dias</option>
                            <option value="30">Ultimos 30 dias</option>
                            <option value="90">Ultimos 90 dias</option>
                        </select>
                    </div>

                    <div class="grupo-filtro">
                        <label for="filtro-rutina">Rutina:</label>
                        <select name="rutina" id="filtro-rutina" class="form-control" onchange="filtrarRutina()">
                            <option value="">Todas las rutinas</option>
                            <?php 
                                $rutinas_unicas =  array_unique(array_column($historial, "rutina_nombre"));
                                foreach($rutinas_unicas as $rutina):?>
                                    <option value="<?php echo htmlspecialchars($rutina);?>"> 
                                        <?php echo htmlspecialchars($rutina);?>

                                    </option>
                                <?php endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="lista-historial">
                <?php if(empty($historial)):?>
                    <div class="no-resultados">

                     <i class="fas fa-clipboard-list"></i>
                        <h3>No hay entrenamientos registrados</h3>
                        <p>Comienza a registrar tus entrenamientos para llevar un seguimiento completo</p>
                        <a href="indice.php?ruta=historial_registrar" class="btn btn-primary">
                            <i class="fas fa-plus"></i>Registrar primer entrenamiento
                        </a>
                    </div>
                <?php else: ?>
                    <?php 
                        $historialPorFecha=[];
                        foreach($historial as $entrenamiento){
                            $fecha=date("Y-m-d",strtotime($entrenamiento["fecha"]));
                            if(!isset($historialPorFecha[$fecha])){
                                $historialPorFecha[$fecha]=[];

                            }

                            $historialPorFecha[$fecha][]=$entrenamiento;
                        }
                        krsort($historialPorFecha);

                    ?>
                <?php foreach($historialPorFecha as $fecha => $entrenamientoDia): ?>
                    <div class="grupo-dia">
                        <div class="cabecera-dia">
                            <h3>
                                <?php 
                                    $fechaObj = new Datetime($fecha);
                                    $hoy = new Datetime();
                                    $ayer = new Datetime('-1 day');
                                    if($fechaObj->format("Y-m-d")==$hoy->format("Y-m-d")){
                                        echo "Hoy";
                                    }elseif($fechaObj->format("Y-m-d")==$ayer->format("Y-m-d")){
                                        echo "Ayer";
                                    }else{
                                        echo strftime("%d de %B de %Y",$fechaObj->getTimestamp());
                                    }
                                ?>
                            </h3>
                            <span class="contador-dia"><?php echo count($entrenamientoDia);?> Entrenamientos</span>
                        </div>
                        <div class="contenido-dia">
                            <?php foreach($entrenamientoDia as $entrenamiento):?>
                                <div class="entrenamiento-card">
                                    <div class="entrenamiento-cabecera">
                                        <div class="informacion-entrenamiento">
                                            <h4><?php echo htmlspecialchars($entrenamiento["rutina_nombre"]);?></h4>
                                            <span class="tiempo-entrenamiento">
                                                <i class="fas fa-clock"></i>
                                                <?php echo date("H:i",strtotime($entrenamiento["fecha"]));?>
                                            </span>
                                        </div>
                                        <div class="acciones-entrenamiento">
                                            <a href="indice.php?ruta=historial_detalles&id=<?php echo $entrenamiento["id"];?>" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>Ver
                                            </a>

                                            <form action="indice.php?ruta=historial_eliminar" method="POST" class="inline-form" onsubmit="return confirm('Estas seguro de que quieres eliminar este entrenamiento?')">
                                                <input type="hidden" name="id" value="<?php echo $entrenamiento["id"];?>">
                                                
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="resumen-entrenamiento">
                                        <div class="item-resumen">
                                            <i class="fas fa-dumbell"></i>
                                            <span>Ejercicios </span>
                                        </div>

                                        <div class="item-resumen">
                                            <i class="fas fa-fire"></i>
                                            <span>Calorias </span>
                                        </div>

                                        <div class="item-resumen">
                                            <i class="fas fa-hourglass-half"></i>
                                            <span>Duracion </span>
                                        </div>

                                    </div>

                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>

         
        </div>
    </main>

    <footer class="pie-pagina">
        <div class="contenedor">
            <div class="pie-contenido">
                <div class="pie-seccion">
                    <h3>MuscleON</h3>
                    <p>Tu compañero perfecto para alcanzar tus metas fitness</p>
                </div>
                <div class="pie-seccion">
                    <h4>Enlaces</h4>
                    <ul>
                        <li><a href="indice.php?ruta=inicio">Inicio</a></li>
                        <li><a href="indice.php?ruta=ejercicios">Ejercicios</a></li>
                        <li><a href="indice.php?ruta=rutinas">Rutinas</a></li>
                        <li><a href="indice.php?ruta=dietas">Dietas</a></li>
                    </ul>
                </div>
                <div class="pie-seccion">
                    <h4>Contacto</h4>
                    <p>info@muscleon.com</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="pie-inferior">
                <p>&copy; 2024 MuscleON. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        function filtrarPorPeriodo() {
            const dias = document.getElementById('filtro-periodo').value;
            if (dias) {
                window.location.href = `indice.php?ruta=historial&periodo=${dias}`;
            } else {
                window.location.href = 'indice.php?ruta=historial';
            }
        }

        function filtrarPorRutina() {
            const rutina = document.getElementById('filtro-rutina').value;
            if (rutina) {
                window.location.href = `indice.php?ruta=historial&rutina=${encodeURIComponent(rutina)}`;
            } else {
                window.location.href = 'indice.php?ruta=historial';
            }
        }

        
        <?php if (isset($_GET['mensaje'])): ?>
            showNotification('<?php echo htmlspecialchars($_GET['mensaje']); ?>', 'success');
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            showNotification('<?php echo htmlspecialchars($_GET['error']); ?>', 'error');
        <?php endif; ?>
    </script>


</body>
</html>