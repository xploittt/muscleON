<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo htmlspecialchars($_GET["grupo"]);?> - MuscleON</title>
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
                    <li><a href="indice.php?ruta=ejercicios">Ejercicios</a></li>
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
            <div class="page-header">
                <h2><i class="fas fa-crosshairs"></i>Ejercicios de <?php echo htmlspecialchars($_GET["grupo"]);?></h2>
                <p> Entrena especificamente el grupo muscular de: <?php echo htmlspecialchars($_GET["grupo"]);?> </p>
            </div>
            <div class="info-grupo">
                <div class="cabecera-grupo">
                    <div class="icono-grupo">
                        <?php 
                            $icon = "fa-dumbbell";
                            switch(strtolower($_GET["grupo"])){
                                case 'pecho': $icon='fa-heart'; break;
                                case 'espalda': $icon='fa-arrows-alt-v'; break;
                                case 'hombros': $icon='fa-arrows-alt'; break;
                                case 'biceps': $icon='fa-arm'; break;
                                case 'triceps': $icon='fa-arm'; break;
                                case 'abdominales': $icon='fa-circle'; break;
                                case 'cuadriceps': $icon='fa-running'; break;
                                case 'femoral': $icon='fa-running'; break;
                                case 'gemelos': $icon='fa-shoe-prints'; break;
                                case 'gluteos': $icon='fa-circle'; break;
                            }
                        ?>
                        <i class="fas <?php echo $icon;?>"></i>
                    </div>
                    <div class="detalles-grupo">
                        <h2><?php echo htmlspecialchars($_GET["grupo"]);?></h2>
                        <div class="stats">
                            <span class="count-badge"><?php echo count($ejercicios);?></span>
                            <span>Ejercicios Disponibles</span>
                        </div>
                    </div>
                </div>

                <div class="descripcion-grupo">
                    <h3>Informacion del Grupo Muscular</h3>
                    <div class="contenido-descripcion">
                        <?php
                        $descriptions = [
                            'Pecho' => 'El pectoral es uno de los grupos musculares más visibles y importantes para una estética equilibrada. Incluye ejercicios como press de banca, flexiones y dips.',
                            'Espalda' => 'Una espalda fuerte es fundamental para la postura y la fuerza general. Incluye dorsales, trapecios y romboides.',
                            'Hombros' => 'Los hombros proporcionan amplitud y simetría al torso. Trabajamos deltoides anterior, lateral y posterior.',
                            'Bíceps' => 'El bíceps braquial es el músculo flexor del brazo, crucial para movimientos de jalón y levantamiento.',
                            'Tríceps' => 'Los tríceps representan 2/3 del volumen del brazo y son esenciales para movimientos de empuje.',
                            'Abdominales' => 'El core es fundamental para la estabilidad y fuerza en todos los movimientos del cuerpo.',
                            'Cuádriceps' => 'Los cuádriceps son los músculos grandes del frente del muslo, esenciales para caminar, correr y saltar.',
                            'Femoral' => 'Los isquiotibiales trabajan en conjunto con los glúteos para la extensión de cadera y flexión de rodilla.',
                            'Gemelos' => 'Los gemelos son importantes para la estabilidad del tobillo y movimientos como saltar y correr.',
                            'Glúteos' => 'Los glúteos son los músculos más grandes del cuerpo, fundamentales para la fuerza y postura.',
                            'Full Body' => 'Los ejercicios de cuerpo completo trabajan múltiples grupos musculares simultáneamente.'
                        ];
                        echo $descriptions[$_GET['grupo']] ?? 'Grupo muscular importante para un entrenamiento completo y equilibrado.';
                        ?>
                    </div>
                </div>

            </div>

            <div class="filter-actions">
                <a href="indice.php?ruta=ejercicios" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>Ver todos los Ejercicios
                </a>
                <div class="sort-options">
                    <label for="sort">Ordenar por:</label>
                    <select id="sort" class="form-control" onchange="ordenarEjercicios()">
                        <option value="nombre">Nombre (A-Z)</option>
                        <option value="dificultad">Dificultad</option>
                        <option value="popularidad">Popularidad</option>
                    </select>
                </div>
            </div>

            <div class="cuadricula-ejercicio">
                <?php if(empty($ejercicios)):?>
                    <div class="no-resultados">
                        <i class="fas fa-dumbbell"></i>
                        <h3>No hay ejercicios para este grupo muscular</h3>
                        <p>Pronto añadiremos ejercicios para <?php echo htmlspecialchars($_GET['grupo']); ?></p>
                        <a href="indice.php?ruta=ejercicios" class="btn btn-primary">Ver otros grupos musculares</a>
                    </div>
                <?php else: ?>
                    <?php foreach($ejercicios as $ejercicio):?>
                        <div class="exercise-card">
                            <div class="exercise-image">
                                <?php if ($ejercicio['imagen_url']): ?>
                                    <img src="<?php echo htmlspecialchars($ejercicio['imagen_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($ejercicio['nombre']); ?>">
                                <?php else: ?>
                                    <div class="placeholder-image">
                                        <i class="fas fa-dumbbell"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="exercise-content">
                                <h3><?php echo htmlspecialchars($ejercicio['nombre']); ?></h3>
                                <span class="muscle-group"><?php echo htmlspecialchars($ejercicio['grupo_muscular']); ?></span>
                                <p><?php echo htmlspecialchars(substr($ejercicio['descripcion'], 0, 100)) . '...'; ?></p>
                                <div class="exercise-actions">
                                    <a href="indice.php?ruta=ejercicio_detalles&id=<?php echo $ejercicio['id']; ?>" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo'] === 'admin'): ?>
                                        <a href="indice.php?ruta=ejercicio_editar&id=<?php echo $ejercicio['id']; ?>" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="indice.php?ruta=ejercicio_eliminar" method="POST" 
                                              class="inline-form" onsubmit="return confirm('¿Estás seguro de eliminar este ejercicio?')">
                                            <input type="hidden" name="id" value="<?php echo $ejercicio['id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
            <div class="grupos-relacionados">
                <h3>Grupos Musculares relacionados</h3>
                <div class="links-relacionados">
                   <?php
                    $related = [
                        'Pecho' => ['Tríceps', 'Hombros', 'Abdominales'],
                        'Espalda' => ['Bíceps', 'Abdominales', 'Glúteos'],
                        'Hombros' => ['Pecho', 'Espalda', 'Tríceps'],
                        'Bíceps' => ['Espalda', 'Antebrazos'],
                        'Tríceps' => ['Pecho', 'Hombros'],
                        'Abdominales' => ['Pecho', 'Espalda', 'Glúteos'],
                        'Cuádriceps' => ['Glúteos', 'Femoral', 'Gemelos'],
                        'Femoral' => ['Glúteos', 'Cuádriceps', 'Espalda baja'],
                        'Gemelos' => ['Cuádriceps', 'Femoral'],
                        'Glúteos' => ['Cuádriceps', 'Femoral', 'Abdominales']
                    ]; 
                    $grupoactual = $_GET["grupo"];
                    $gruposRelacionados= $related[$grupoactual]??["Pecho", "Espalda", "Pierna"];

                    foreach($gruposRelacionados as $grupo){
                        echo '<a href="indice.php?ruta=ejercicio_grupo&grupo=' . urlencode($grupo) . '" class="tag">' . htmlspecialchars($group) . '</a>';
                    }
                    ?>
                </div>
            </div>

        </div>



    </main>

    <pie-pagina class="pie-pagina">
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
    </pie-pagina>

    
    <script>
        function ordenarEjercicios(){
            const sortValue = document.getElementById("sort").value;
            const grid = document.querySelector("cuadricula-ejercicio");
            const cards = Array.from(grid.querySelectorAll("exercise-card"));

            cards.sort((a,b)=>{
                const titleA = a.querySelector("h3").textContent.toLowerCase();
                const titleB = b.querySelector("h3").textContent.toLowerCase();
                if(sortValue==="nombre"){
                    return titleA.localeCompare(titleB);

                }
                return 0;
           });
        }

        <?php if (isset($_GET['mensaje'])): ?>
            showNotification('<?php echo htmlspecialchars($_GET['mensaje']); ?>', 'success');
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            showNotification('<?php echo htmlspecialchars($_GET['error']); ?>', 'error');
        <?php endif; ?>

    </script>

    <script src="../../publica/js/main.js"></script>
</body>
</html>