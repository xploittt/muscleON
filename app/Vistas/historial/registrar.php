<?php require_once __DIR__ . "/../../SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrenamiento - MuscleON</title>
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
                    <a href="indice.php?ruta=logout">Logout</a>
                </div>
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
                <h1><i class="fas fa-plus-circle"></i>Registrar Entrenamiento</h1>
            </div>
          
            <?php if($rutina):?>
                <div class="rutina-seleccionada">
                    <div class="info-rutina">
                        <h3>Rutina</h3>
                        <div class="detalles-rutina">
                            <span class="nombre-rutina"><?php echo htmlspecialchars($rutina["nombre"]);?></span>
                        </div>
                    </div>
                    <a href="indice.php?ruta=historial_registrar" class="boton boton-secundario">
                        <i class="fas fa-times"></i>Cambiar
                    </a>
                </div>
            <?php endif;?>
            <form action="indice.php?ruta=historial_guardar" method="POST" class="formulario-entrenamiento">
                <?php if($rutina):?>
                    <input type="hidden" name="rutina_id" value="<?php echo $rutina["id"];?>">
                <?php endif;?>

                <?php if(!$rutina):?>
                    <div class="seccion-form">
                        <h3><i class="fas fa-list"></i>Seleccionar Rutina</h3>
                        <div class="grupo-form">
                            <label for="rutina_id">Rutina: </label>
                            <select name="rutina_id" id="rutina_id" class="control-formulario" required onchange="cargarEjercicios()">
                                <option value="">Selecciona una Rutina</option>
                                <?php 
                                    $rutina_modelo=new Rutina();
                                    $usuario_id=$_SESSION["usuario"]["id"];
                                    $rutinas_usuario=$rutina_modelo->listarPorUsuario($usuario_id);
                                    foreach($rutinas_usuario as $rut): ?>
                                        <option value="<?php echo $rut["id"];?>">
                                            <?php echo htmlspecialchars($rut["nombre"]);?>
                                        </option>
                                    <?php endforeach;?>

                               
                            </select>
                        </div>
                    </div>
                <?php endif;?>
                <div class="seccion-form">
                    <h3><i class="fas fa-dumbbell"></i>Ejercicios Realizado</h3>
                    <div id="contenedor-ejercicios">
                        <?php if($rutina && !empty($ejercicios)):?>
                            <?php foreach($ejercicios as $index => $ejercicio):?>
                                <div class="ingreso-ejercicio" data-exercise-id="<?php echo $ejercicio["ejercicio_id"];?>">
                                    <div class="ejercicio-cabecera">
                                        <div class="info-ejercicio">
                                            <h4><?php echo htmlspecialchars($ejercicio["nombre"]);?></h4>
                                            <span class="grupo-ejercicio"><?php echo htmlspecialchars($ejercicio["grupo_muscular"]);?></span>
                                        </div>
                                        <div class="acciones-ejercicio">
                                            <button type="button" class="boton boton-pequeño boton-peligro" onclick="eliminarEjercicio(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="detalles-ejercicio">
                                        <div class="detalle-fila">
                                            <div class="detalle-grupo">
                                                <label>Series Completadas *</label>
                                                <input type="number" name="ejercicios[<?php echo $ejercicio['ejercicio_id']; ?>][series_completadas]" 
                                                       class="control-formulario" min="1" max="10" value="<?php echo $ejercicio['series'] ?? 3; ?>" required>
                                            </div>
                                            <div class="detalle-grupo">
                                                <label>Repeticiones *</label>
                                                <input type="number" name="ejercicios[<?php echo $ejercicio['ejercicio_id']; ?>][repeticiones_completadas]" 
                                                       class="control-formulario" min="1" max="50" value="<?php echo $ejercicio['repeticiones'] ?? 10; ?>" required>
                                            </div>
                                            <div class="detalle-grupo">
                                                <label>Peso Usado (kg) *</label>
                                                <input type="number" name="ejercicios[<?php echo $ejercicio['ejercicio_id']; ?>][peso_usado]" 
                                                       class="control-formulario" min="0" step="0.5" value="<?php echo $ejercicio['peso'] ?? 0; ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="volume-display">
                                            <span class="volume-label">Volumen Total:</span>
                                            <span class="volume-value">
                                                <?php 
                                                $volumen = ($ejercicio['series'] ?? 3) * ($ejercicio['repeticiones'] ?? 10) * ($ejercicio['peso'] ?? 0);
                                                echo number_format($volumen, 2); 
                                                ?> kg
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="sin-ejercicios-seleccionados">
                                <i class="fas fa-dumbbell"></i>
                                <p>Selecciona una rutina para cargar sus ejercicios</p>
                            </div>
                        <?php endif; ?>
                    </div>

                     <button type="button" class="btn btn-contorno" onclick="agregarEjercicioManual()">
                        <i class="fas fa-plus"></i> Agregar Ejercicio
                    </button>
                </div>

                 <div class="seccion-form">
                    <h3><i class="fas fa-sticky-note"></i> Notas del Entrenamiento</h3>
                    <div class="grupo-form">
                        <label for="notas">Notas adicionales</label>
                        <textarea id="notas" name="notas" class="control-formulario" rows="4"
                                  placeholder="Notas del entrenamiento"></textarea>
                    </div>
                </div>

                <div class="seccion-form">
                    <h3><i class="fas fa-heart"></i> Sensación General</h3>
                    <div class="selector-sensacion">
                        <div class="sensacion-opcion">
                            <input type="radio" id="feeling-excellent" name="sensacion" value="excelente">
                            <label for="feeling-excellent" class="feeling-label excellent">
                                <i class="fas fa-smile"></i>
                                <span>Excelente</span>
                            </label>
                        </div>
                        <div class="sensacion-opcion">
                            <input type="radio" id="feeling-good" name="sensacion" value="bueno" checked>
                            <label for="feeling-good" class="feeling-label good">
                                <i class="fas fa-meh"></i>
                                <span>Bueno</span>
                            </label>
                        </div>
                        <div class="sensacion-opcion">
                            <input type="radio" id="feeling-normal" name="sensacion" value="normal">
                            <label for="feeling-normal" class="feeling-label normal">
                                <i class="fas fa-meh"></i>
                                <span>Normal</span>
                            </label>
                        </div>
                        <div class="sensacion-opcion">
                            <input type="radio" id="feeling-bad" name="sensacion" value="malo">
                            <label for="feeling-bad" class="feeling-label bad">
                                <i class="fas fa-frown"></i>
                                <span>Malo</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="acciones-form">
                    <a href="indice.php?ruta=historial" class="boton boton-secundario">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="boton boton-primario">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>

            </form>

            <!-- consejos -->
            <div class="seccion-form">
                <h3>Consejos</h3>
                <div>
                    <p>• Sé honesto con los pesos</p>
                    <p>• Registra justo despues de entrenar</p>
                    <p>• Anota molestias</p>
                </div>
            </div>
        </div>
    </main>
    <footer class="pie-pagina">
        <div class="contenedor">
            <div class="pie-inferior">
                <p>&copy; 2026 muscleON - TFG DAW</p>
            </div>
        </div>
    </footer>
    
    <script>
        let exerciseCounter = <?php echo isset($ejercicios) ? count($ejercicios) : 0; ?>;

        function cargarEjercicios() {
            const rutinaId = document.getElementById('rutina_id').value;
            if (!rutinaId) {
                document.getElementById('contenedor-ejercicios').innerHTML = `
                    <div class="no-exercises-selected">
                        <i class="fas fa-dumbbell"></i>
                        <p>Selecciona una rutina para cargar sus ejercicios</p>
                    </div>
                `;
                return;
            }

            // Aquí podrías hacer una llamada AJAX para cargar los ejercicios de la rutina
            console.log('Cargando ejercicios para la rutina:', rutinaId);
        }

        function agregarEjercicioManual() {
            const contenedor = document.getElementById('contenedor-ejercicios');
            const exerciseId = 'manual_' + exerciseCounter++;
            
            const exerciseHTML = `
                <div class="exercise-entry" data-exercise-id="${exerciseId}">
                    <div class="exercise-header">
                        <div class="exercise-info">
                            <input type="text" name="ejercicios[${exerciseId}][nombre]" 
                                   class="form-control exercise-name" placeholder="Nombre del ejercicio" required>
                            <input type="text" name="ejercicios[${exerciseId}][grupo_muscular]" 
                                   class="form-control exercise-group" placeholder="Grupo muscular" required>
                        </div>
                        <div class="exercise-actions">
                            <button type="button" class="btn btn-sm btn-danger" onclick="eliminarEjercicio(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="exercise-details">
                        <div class="detail-row">
                            <div class="detail-group">
                                <label>Series Completadas *</label>
                                <input type="number" name="ejercicios[${exerciseId}][series_completadas]" 
                                       class="form-control" min="1" max="10" value="3" required onchange="calcularVolumen(this)">
                            </div>
                            <div class="detail-group">
                                <label>Repeticiones *</label>
                                <input type="number" name="ejercicios[${exerciseId}][repeticiones_completadas]" 
                                       class="form-control" min="1" max="50" value="10" required onchange="calcularVolumen(this)">
                            </div>
                            <div class="detail-group">
                                <label>Peso Usado (kg) *</label>
                                <input type="number" name="ejercicios[${exerciseId}][peso_usado]" 
                                       class="form-control" min="0" step="0.5" value="0" required onchange="calcularVolumen(this)">
                            </div>
                        </div>
                        
                        <div class="volume-display">
                            <span class="volume-label">Volumen Total:</span>
                            <span class="volume-value">0 kg</span>
                        </div>
                    </div>
                </div>
            `;
            
            contenedor.insertAdjacentHTML('beforeend', exerciseHTML);
        }

        function eliminarEjercicio(button) {
            if (confirm('¿Estás seguro de eliminar este ejercicio?')) {
                button.closest('.exercise-entry').remove();
                calcularVolumenTotal();
            }
        }

        function calcularVolumen(input) {
            const exerciseEntry = input.closest('.exercise-entry');
            const series = parseInt(exerciseEntry.querySelector('input[name*="series_completadas"]').value) || 0;
            const reps = parseInt(exerciseEntry.querySelector('input[name*="repeticiones_completadas"]').value) || 0;
            const peso = parseFloat(exerciseEntry.querySelector('input[name*="peso_usado"]').value) || 0;
            
            const volumen = series * reps * peso;
            exerciseEntry.querySelector('.volume-value').textContent = volumen.toFixed(2) + ' kg';
        }

        function calcularVolumenTotal() {
            // Implementar cálculo de volumen total si es necesario
        }

        // Validación del formulario
        document.addEventListener('DOMContentLoaded', function(){
            const form = document.querySelector(".formulario-entrenamiento");
            if(form){
                form.addEventListener("submit",function(e)){
                    const exercises = document.querySelectorAll('.exercise-entry');
                    if (exercises.length === 0) {
                        e.preventDefault();
                        showNotification('Debes agregar al menos un ejercicio', 'error');
                        return;
                    }

                    exercises.forEach(exercise => {
                        const inputs = exercise.querySelectorAll('input[required]');
                        inputs.forEach(input => {
                            if (!input.value.trim()) {
                                e.preventDefault();
                                input.classList.add('error');
                            }
                        });
                    });
                }
            }
            
        });

        // Mostrar error si existe
        <?php if (isset($error)): ?>
            showNotification('<?php echo htmlspecialchars($error); ?>', 'error');
        <?php endif; ?>
    </script>
   
</body>
</html>