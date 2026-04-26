<?php require_once _DIR_ . "/../../app/SoftwareIntermedio/AuthMilddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios - MuscleON</title>
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
            <div class="page-header">
                <h1><i class="fas fa-dumbbell"></i> Catálogo de Ejercicios</h1>
                <p>Explora nuestra completa base de datos de ejercicios</p>
            </div>

            <div class="controles-ejercicio">
                <div class="barra-busqueda">
                    <form action="indice.php" method="GET">
                        <input type="hidden" name="ruta" value="ejercicio_buscar">
                        <div class="grupo-busqueda">
                            <input type="text" name="termino" placeholder="Buscar ejercicios..." class="form-control">
                            <button type="submit" class="btn btn-primario">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="filtro-grupo">
                    <label for="grupo-filtro">Filtrar por grupo muscular:</label>
                    <select id="grupo-filtro" class="form-control" onchange="filtrarPorGrupo()">
                        <option value="">Todos</option>
                        <?php foreach ($grupos as $grupo): ?>
                            <option value="<?php echo htmlspecialchars($grupo); ?>">
                                <?php echo htmlspecialchars($grupo); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="indice.php?ruta=ejercicio_crear" class="btn btn-success">
                        <i class="fas fa-plus"></i> Nuevo Ejercicio
                    </a>
                <?php endif; ?>
            </div>

            <div class="conjunto-ejercicios">
                <?php if (empty($ejercicios)): ?>
                    <div class="no-resultados">
                        <i class="fas fa-search"></i>
                        <h3>No se encontraron ejercicios</h3>
                        <p>Intenta con otra búsqueda o añade nuevos ejercicios</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($ejercicios as $ejercicio): ?>
                        <div class="lista-ejercicios">
                            <div class="imagen-ejercicios">
                                <?php if ($ejercicio['imagen_url']): ?>
                                    <img src="<?php echo htmlspecialchars($ejercicio['imagen_url']); ?>" 
                                         alt="<?php echo htmlspecialchars($ejercicio['nombre']); ?>">
                                <?php else: ?>
                                    <div class="placeholder-image">
                                        <i class="fas fa-dumbbell"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="contenido-ejercicios">
                                <h3><?php echo htmlspecialchars($ejercicio['nombre']); ?></h3>
                                <span class="grupo-muscular"><?php echo htmlspecialchars($ejercicio['grupo_muscular']); ?></span>
                                <p><?php echo htmlspecialchars(substr($ejercicio['descripcion'], 0, 100)) . '...'; ?></p>
                                <div class="acciones-ejercicio">
                                    <a href="indice.php?ruta=ejercicio_detalles&id=<?php echo $ejercicio['id']; ?>" 
                                       class="btn btn-primario btn-sm">
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
                    <?php endforeach; ?>
                <?php endif; ?>
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
        function filtrarPorGrupo() {
            const grupo = document.getElementById('grupo-filter').value;
            if (grupo) {
                window.location.href = `indice.php?ruta=ejercicio_grupo&grupo=${encodeURIComponent(grupo)}`;
            } else {
                window.location.href = 'indice.php?ruta=ejercicios';
            }
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