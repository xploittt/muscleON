<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ejercicio - MuscleON</title>
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
                <h1><i class="fas fa-plus-circle"></i>Crear nuevo ejercicio</h1>
                <p>Añade un nuevo ejercicio a nuestra base de datos</p>
            </div>
            <div class="form-contenedor">
                <form action="indice.php?ruta=ejercicio-guardar" method="POST" class="formulario-ejercicio">
                    <div class="form-row">
                        <div class="grupo-formulario">
                            <label for="nombre">Nombre del Ejercicio: </label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="ej:Press Inclinado">
                        </div>
                        <div class="grupo-formulario">
                            <label for="grupo_muscular">Grupo Muscular: </label>
                            <select name="form-control" id="grupo_muscular" class="grupo_muscular" required>
                                <option value="">
                                    Selecciona un grupo Muscular
                                </option>
                                <option value="pecho">Pecho</option>
                                <option value="espalda">Espalda</option>
                                <option value="hombro">Hombro</option>
                                <option value="biceps">Biceps</option>
                                <option value="triceps">Triceps</option>
                                <option value="abdominales">Abdominales</option>
                                <option value="cuadriceps">Cuadriceps</option>
                                <option value="femoral">Femoral</option>
                                <option value="gemelo">Gemelo</option>
                                <option value="gluteo">Gluteo</option>
                                <option value="fullbody">FullBody</option>
                            </select>
                        </div>
                    </div>
                    <div class="grupo-formulario">
                        <label for="descripcion">Descripcion: </label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="6" required placeholder="Describe detalladamente como se hace el ejercicio"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="grupo-formulario">
                            <label for="imagen_url">URL de la Imagen</label>
                            <input type="url" id="imagen_url" name="imagen_url" class="form-control" placeholder="https://unejemplo.com/imagen1.jpg">
                                <small class="form-help">URL de una imagen que muestra el ejercicio</small>
                        </div>

                        <div class="grupo-formulario">
                            <label for="video_url">URL del video</label>
                            <input type="url" id="video_url" name="video_url" class="form-control" placeholder="https://youtube.com/embed/...">
                                <small class="form-help">URL de un video tutorial que muestra el ejercicio</small>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="indice.php?ruta=ejercicios" class="btn btn-secondary">
                            <i class="fas fa-times"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>Crear Ejercicio
                        </button>
                    </div>

                </form>
            </div>
            <div class="tips-section">
                <h3><i class="fas fa-lightbulb"></i>Consejos para crear un buen ejercicio </h3>
                <div class="tips-grid">
                    <div class="tip-item">
                        <i class="fas fa-check"></i>
                        <p>Usa un nombre claro y descriptivo</p>
                    </div>

                    <div class="tip-item">
                        <i class="fas fa-check"></i>
                        <p>Describe paso a paso la tecnica correcta</p>
                    </div>
                        
                    <div class="tip-item">
                        <i class="fas fa-check"></i>
                        <p>Nombra los musculos principales que se trabajan</p>
                    </div>

                    <div class="tip-item">
                        <i class="fas fa-check"></i>
                        <p>Incluye recomendaciones personales de seguridad</p>
                    </div>
                </div>
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
        document.querySelector('.formulario-ejercicio').addEventListener('submit', function(e) {
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