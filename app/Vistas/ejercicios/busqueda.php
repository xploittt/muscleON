<?php require_once __DIR__ . "/../../SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Busqueda - MuscleON</title>
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
                <h2><i class="fas fa-search"></i> Resultado de la Busqueda</h2>
                <p> Buscando: <?php echo htmlspecialchars($_GET["termino"]);?> </p>
            </div>

            <div class="info-busqueda">
                <div class="contador-result">
                    <span class="count-badge"><?php echo count($ejercicios);?></span>
                    <span>ejercicios encontrados</span>
                </div>
                <div class="acciones-busqueda">
                    <a href="indice.php?ruta=ejercicios" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>Volver a todos los ejercicios
                    </a>

                    <form action="indice.php" method="GET" class="busqueda-enlinea-formulario">
                        <input type="hidden" name="ruta" value="ejercicio_buscar">
                        <input type="text" name="termino" class="form-control" value="<?php echo htmlspecialchars($_GET["termino"]);?>" placeholder="Nueva Busqueda...">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                </div>
            </div>
               <div class="cuadricula-ejercicio">
                <?php if(empty($ejercicios)):?>
                    <div class="no-resultados">
                        <i class="fas fa-search"></i>
                        <h3>No se encontraron ejercicios</h3>
                        <p>No hay resultados para <?php echo htmlspecialchars($_GET['termino']); ?></p>
                        <div class="sugerencias-busqueda">
                            <h4>Sugerencias</h4>
                            <ul>
                                <li>Intenta con terminos mas generales</li>
                                <li>Comprueba la ortografia de tu busqueda</li>
                                <li>Usa palabras clave como: "press","curl"...</li>
                                <li>Busca por grupos musculares: "pecho", "espalda"...</li>
                            </ul>
                        </div>
                        <div class="alternativas-busqueda">
                            <h4>Prueba con estos ejercicios populares</h4>
                            <div class="links-atajo">
                                <a href="indice.php?ruta=ejercicio_buscar&termino=press" class="tag">Press</a>
                                <a href="indice.php?ruta=ejercicio_buscar&termino=curl" class="tag">Curl</a>
                                <a href="indice.php?ruta=ejercicio_buscar&termino=squat" class="tag">Squat</a>
                                <a href="indice.php?ruta=ejercicio_buscar&termino=deadlift" class="tag">Deadlift</a>
                                <a href="indice.php?ruta=ejercicio_buscar&termino=push" class="tag">Push</a>
                                <a href="indice.php?ruta=ejercicio_buscar&termino=Pull" class="tag">Pull</a>
                            </div>
                        </div>
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
        document.querySelector('.exercise-form').addEventListener('submit', function(e) {
            const nombre = document.getElementById('nombre').value.trim();
            const descripcion = document.getElementById('descripcion').value.trim();
            const grupoMuscular = document.getElementById('grupo_muscular').value;

            if (!nombre || !descripcion || !grupoMuscular) {
                e.preventDefault();
                showNotification('Por favor, completa todos los campos obligatorios', 'error');
                return;
            }

            if (nombre.length < 3) {
                e.preventDefault();
                showNotification('El nombre debe tener al menos 3 caracteres', 'error');
                return;
            }

            if (descripcion.length < 20) {
                e.preventDefault();
                showNotification('La descripción debe tener al menos 20 caracteres', 'error');
                return;
            }
        });

        document.getElementById('imagen_url').addEventListener('blur', function() {
            const url = this.value.trim();
            if (url && isValidUrl(url)) {
                console.log('URL de imagen válida:', url);
            }
        });

        function isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (_) {
                return false;
            }
        }

        <?php if (isset($error)): ?>
            showNotification('<?php echo htmlspecialchars($error); ?>', 'error');
        <?php endif; ?>
    </script>

    <script src="../../publica/js/main.js"></script>
</body>
</html>