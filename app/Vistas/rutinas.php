<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <title>RUTINAS - MuscleON</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="hero">
        <nav class="barra-navegacion">
            <div class="contenedor-navegacion">
                <div class="nav-logo">
                    <i class="fas fa-dumbbell"></i>
                    <span>MuscleON</span>
                </div>
                <ul class="enlaces-navegacion">
                    <li><a href="indice.php?ruta=inicio">Inicio</a></li>
                    <li><a href="indice.php?ruta=ejercicios">Ejercicios</a></li>
                    <li><a href="indice.php?ruta=rutinas" class="active" >Rutinas</a></li>
                    <li><a href="indice.php?ruta=dietas">Dietas</a></li>
                    <li><a href="indice.php?ruta=logout">Logout</a></li>
                </ul>
                
            </div>
        </nav>
    </header>
    <main class="main-content">
        <div class="contenedor">
            <div class="cabecera-pagina">
                <h1><i class="fas fa-clipboard-list"></i>MIS RUTINAS</h1>
                <p>Gestiona tus rutinas de entrenamiento</p>
            </div>
            <div class="seccion-form">
                <h3><i class="fas fa-plus"></i>CREAR NUEVA RUTINA</h3>
                <form action="indice.php?ruta=guardar_rutina" method="POST" class="formulario-rutina">
                    <div class="grupo-form-auth">
                        <label for="nombre">Nombre de la Rutina:</label>
                        <input type="text" name="nombre" placeholder="EJ: Rutina de Espalda" required class="control-formulario-auth">
                    </div>
                    <div class="grupo-form-auth">
                        <label for="descripcion">Descripcion:</label>
                        <textarea name="descripcion" placeholder="Describe las caracteristicas de esta rutina o tus objetivos" class="control-formulario-auth" rows="4"> </textarea>
                    </div>
                    <button type="submit" class="boton-auth">
                        <i class="fas fa-save"></i>Crear Rutina
                    </button>
                </form>
            </div>
            <div class="cabecera-pagina">
                <h2><i class="fas fa-list"></i>Mis Rutinas</h2>
            </div>

            <div class="grid-caracteristicas">
                <?php if(empty($rutinas)):?>
                    <div class="tarjeta-caracteristica" style= "grid-column: 1 / -1; text-align:center;">
                        <i class="fas fa-clipboard-list icono-rutina"></i>
                        <h3>No tienes rutinas creadas</h3>
                        <p>Tienes que crear tu primera rutina de entrenamiento</p>
                    </div>
                <?php else:?>
                    <?php foreach($rutinas as $r):?>
                        <div class="tarjeta-caracteristica" >
                            <div class="icono-caracteristica"><i class="fas fa-dumbbell"></i></div>
                            <h3><?= htmlspecialchars($r["nombre"])?></h3>
                            <p><?= htmlspecialchars($r["descripcion"])?></p>
                            <div class="ejercicios-rutina">
                                <h4><i class="fas fa-list"></i>EJERCICIOS</h4>
                                <?php if(!empty($ejerciciosPorRutina[$r["id"]])):?>
                                    <ul class="lista-ejercicios">
                                        <?php foreach($ejerciciosPorRutina[$r["id"]] as $er):?>
                                            <li>
                                                <i class="fas fa-check"></i>
                                                <?= htmlspecialchars($er["ejercicio_nombre"])?>
                                                <span class="detalle-ejercicio">Series: <?= (int)$er["series"]?>, Repeticiones: <?= (int)$er["repeticiones"]?></span>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php else:?>
                                    <p class="no-ejercicios-rutina">Sin ejercicios asignados</p>
                                <?php endif;?>


                            </div>
                            <div class="acciones-rutina">
                                <a href="indice.php?ruta=historial_registrar&rutina_id=<?= $r["id"]?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-play"></i>Entrenar
                                </a>
                                <button class="btn boton-contorno btn-sm" onclick="alert('Funcion de edicion en proceso')">
                                    <i class="fas fa-edit"></i>Editar
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
   
</body>
</html>