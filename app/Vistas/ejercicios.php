<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios - MuscleON</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="hero">
        <nav class="barra-navegacion">
            <div class="contenedor-navegacion">
                <div class="logo">
                    <i class="fas fa-dumbbell"></i>
                    <span>MuscleON</span>
                </div>
                <ul class="enlaces-navegacion">
                    <li><a href="indice.php?ruta=inicio">Inicio</a></li>
                    <li><a href="indice.php?ruta=ejercicios" class="active">Ejercicios</a></li>
                    <li><a href="indice.php?ruta=rutinas">Rutinas</a></li>
                    <li><a href="indice.php?ruta=dietas">Dietas</a></li>
                    <li><a href="indice.php?ruta=historial">Historial</a></li>
                    <li><a href="indice.php?ruta=logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="contenido-principal">
        <div class="contenedor">
            <div class="cabecera-pagina">
                <h1><i class="fas fa-dumbbell"></i> Catálogo de Ejercicios</h1>
                <p>Explora y gestiona todos los ejercicios disponibles</p>
            </div>

            <div class="seccion-form">
                <h3><i class="fas fa-plus"></i> Agregar Nuevo Ejercicio</h3>
                <form action="indice.php?ruta=guardar_ejercicio" method="POST" class="formulario-ejercicio">
                    <div class="fila-form">
                        <div class="grupo-form-auth">
                            <label for="nombre">Nombre del Ejercicio:</label>
                            <input type="text" name="nombre" placeholder="Ej: Press de Banca" required class="control-formulario-auth">
                        </div>
                        <div class="grupo-form-auth">
                            <label for="grupo_muscular">Grupo Muscular:</label>
                            <select name="grupo_muscular" required class="control-formulario-auth">
                                <option value="">Selecciona...</option>
                                <option value="Pecho">Pecho</option>
                                <option value="Espalda">Espalda</option>
                                <option value="Hombros">Hombros</option>
                                <option value="Bíceps">Bíceps</option>
                                <option value="Tríceps">Tríceps</option>
                                <option value="Abdomen">Abdomen</option>
                                <option value="Cuádriceps">Cuádriceps</option>
                                <option value="Femoral">Femoral</option>
                                <option value="Glúteos">Glúteos</option>
                                <option value="Gemelos">Gemelos</option>
                            </select>
                        </div>
                    </div>
                    <div class="grupo-form-auth">
                        <label for="descripcion">Descripción:</label>
                        <textarea name="descripcion" placeholder="Describe cómo realizar el ejercicio correctamente" class="control-formulario-auth" rows="3" required></textarea>
                    </div>
                    <div class="fila-form">
                        <div class="grupo-form-auth">
                            <label for="imagen_url">URL Imagen (opcional):</label>
                            <input type="url" name="imagen_url" placeholder="https://ejemplo.com/imagen.jpg" class="control-formulario-auth">
                        </div>
                        <div class="grupo-form-auth">
                            <label for="video_url">URL Video (opcional):</label>
                            <input type="url" name="video_url" placeholder="https://youtube.com/watch?v=..." class="control-formulario-auth">
                        </div>
                    </div>
                    <button type="submit" class="boton-auth">
                        <i class="fas fa-save"></i> Agregar Ejercicio
                    </button>
                </form>
            </div>

            <div class="cabecera-pagina">
                <h2><i class="fas fa-list"></i> Todos los Ejercicios</h2>
            </div>

            <div class="rejilla-caracteristicas">
                <?php if(empty($ejercicios)):?>
                    <div class="tarjeta-caracteristica" style="grid-column: 1 / -1; text-align: center;">
                        <i class="fas fa-dumbbell" style="font-size: 4rem; color: var(--color-texto-claro); margin-bottom: 1rem;"></i>
                        <h3>No hay ejercicios registrados</h3>
                        <p>Comienza agregando ejercicios al catálogo</p>
                    </div>
                <?php else: ?>
                    <?php foreach($ejercicios as $e):?>
                        <div class="tarjeta-caracteristica">
                            <div class="icono-caracteristica">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                            <h3><?=htmlspecialchars($e["nombre"])?></h3>
                            <div class="grupo-muscular-etiqueta">
                                <i class="fas fa-tag"></i>
                                <?=htmlspecialchars($e["grupo_muscular"])?>
                            </div>
                            <p><?=htmlspecialchars($e["descripcion"])?></p>
                            
                            <?php if(!empty($e["imagen_url"])):?>
                                <div class="ejercicio-imagen">
                                    <img src="<?=htmlspecialchars($e["imagen_url"])?>" alt="<?=htmlspecialchars($e["nombre"])?>" onerror="this.style.display='none'">
                                </div>
                            <?php endif;?>
                            
                            <div class="acciones-ejercicio">
                                <?php if(!empty($e["video_url"])):?>
                                    <a href="<?=htmlspecialchars($e["video_url"])?>" target="_blank" class="boton boton-primario boton-pequeño">
                                        <i class="fas fa-play"></i> Ver Video
                                    </a>
                                <?php endif;?>
                                <button class="boton boton-contorno boton-pequeño" onclick="alert('Función de edición próximamente')">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
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
                        <li><a href="indice.php?ruta=historial">Historial</a></li>
                    </ul>
                </div>
            </div>
            <div class="pie-inferior">
                <p>&copy; 2024 MuscleON. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

   
</body>
</html>