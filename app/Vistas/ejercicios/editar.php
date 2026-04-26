<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ejercicio - MuscleON</title>
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
                <h1><i class="fas fa-edit"></i> Editar Ejercicio</h1>
                <p>Modifica la información del ejercicio: <?php echo htmlspecialchars($ejercicio['nombre']); ?></p>
            </div>

            <div class="form-contenedor">
                <form action="indice.php?ruta=ejercicio_actualizar" method="POST" class="exercise-form">
                    <input type="hidden" name="id" value="<?php echo $ejercicio['id']; ?>">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre del Ejercicio *</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required
                                   value="<?php echo htmlspecialchars($ejercicio['nombre']); ?>"
                                   placeholder="Ej: Press de Banca">
                        </div>
                        <div class="form-group">
                            <label for="grupo_muscular">Grupo Muscular *</label>
                            <select id="grupo_muscular" name="grupo_muscular" class="form-control" required>
                                <option value="">Selecciona un grupo muscular</option>
                                <option value="Pecho" <?php echo $ejercicio['grupo_muscular'] === 'Pecho' ? 'selected' : ''; ?>>Pecho</option>
                                <option value="Espalda" <?php echo $ejercicio['grupo_muscular'] === 'Espalda' ? 'selected' : ''; ?>>Espalda</option>
                                <option value="Hombros" <?php echo $ejercicio['grupo_muscular'] === 'Hombros' ? 'selected' : ''; ?>>Hombros</option>
                                <option value="Bíceps" <?php echo $ejercicio['grupo_muscular'] === 'Bíceps' ? 'selected' : ''; ?>>Bíceps</option>
                                <option value="Tríceps" <?php echo $ejercicio['grupo_muscular'] === 'Tríceps' ? 'selected' : ''; ?>>Tríceps</option>
                                <option value="Abdominales" <?php echo $ejercicio['grupo_muscular'] === 'Abdominales' ? 'selected' : ''; ?>>Abdominales</option>
                                <option value="Cuádriceps" <?php echo $ejercicio['grupo_muscular'] === 'Cuádriceps' ? 'selected' : ''; ?>>Cuádriceps</option>
                                <option value="Femoral" <?php echo $ejercicio['grupo_muscular'] === 'Femoral' ? 'selected' : ''; ?>>Femoral</option>
                                <option value="Gemelos" <?php echo $ejercicio['grupo_muscular'] === 'Gemelos' ? 'selected' : ''; ?>>Gemelos</option>
                                <option value="Glúteos" <?php echo $ejercicio['grupo_muscular'] === 'Glúteos' ? 'selected' : ''; ?>>Glúteos</option>
                                <option value="Full Body" <?php echo $ejercicio['grupo_muscular'] === 'Full Body' ? 'selected' : ''; ?>>Full Body</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción *</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="6" required
                                  placeholder="Describe detalladamente cómo se realiza el ejercicio, los músculos que trabaja, y cualquier recomendación importante..."><?php echo htmlspecialchars($ejercicio['descripcion']); ?></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="imagen_url">URL de la Imagen</label>
                            <input type="url" id="imagen_url" name="imagen_url" class="form-control"
                                   value="<?php echo htmlspecialchars($ejercicio['imagen_url'] ?? ''); ?>"
                                   placeholder="https://ejemplo.com/imagen.jpg">
                            <small class="form-help">URL de una imagen que muestre el ejercicio</small>
                        </div>
                        <div class="form-group">
                            <label for="video_url">URL del Video</label>
                            <input type="url" id="video_url" name="video_url" class="form-control"
                                   value="<?php echo htmlspecialchars($ejercicio['video_url'] ?? ''); ?>"
                                   placeholder="https://youtube.com/embed/...">
                            <small class="form-help">URL de un video tutorial (YouTube, Vimeo, etc.)</small>
                        </div>
                    </div>

                    <?php if ($ejercicio['imagen_url']): ?>
                        <div class="image-preview">
                            <h4>Vista previa de la imagen actual:</h4>
                            <img src="<?php echo htmlspecialchars($ejercicio['imagen_url']); ?>" 
                                 alt="<?php echo htmlspecialchars($ejercicio['nombre']); ?>"
                                 style="max-width: 200px; height: auto; border-radius: 8px;">
                        </div>
                    <?php endif; ?>

                    <div class="form-actions">
                        <a href="indice.php?ruta=ejercicio_detalles&id=<?php echo $ejercicio['id']; ?>" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primario">
                            <i class="fas fa-save"></i> Actualizar Ejercicio
                        </button>
                    </div>
                </form>
            </div>

            <div class="danger-zone">
                <h3><i class="fas fa-exclamation-triangle"></i> Zona de Peligro</h3>
                <p>Estas acciones son irreversibles. Ten cuidado al realizar cambios.</p>
                <form action="indice.php?ruta=ejercicio_eliminar" method="POST" 
                      class="delete-form" onsubmit="return confirm('¿Estás seguro de eliminar este ejercicio? Esta acción no se puede deshacer.')">
                    <input type="hidden" name="id" value="<?php echo $ejercicio['id']; ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Eliminar Ejercicio
                    </button>
                </form>
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
            const previewcontenedor = document.querySelector('.image-preview');
            
            if (url && isValidUrl(url)) {
                if (!previewcontenedor) {
                    const contenedor = document.createElement('div');
                    contenedor.className = 'image-preview';
                    contenedor.innerHTML = '<h4>Vista previa de la imagen:</h4>';
                    const img = document.createElement('img');
                    img.src = url;
                    img.alt = 'Vista previa';
                    img.style.cssText = 'max-width: 200px; height: auto; border-radius: 8px;';
                    contenedor.appendChild(img);
                    this.parentElement.parentElement.insertBefore(contenedor, this.parentElement.parentElement.lastElementChild);
                } else {
                    const img = previewcontenedor.querySelector('img');
                    img.src = url;
                }
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