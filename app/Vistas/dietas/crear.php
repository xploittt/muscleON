<?php require_once __DIR__ . "/../../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Dieta - MuscleON</title>
    <link rel="stylesheet" href="/muscleON/publica/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
                    <a href="indice.php?ruta=inicio">Inicio</a>
                    <a href="indice.php?ruta=ejercicios" >Ejercicios</a>
                    <a href="indice.php?ruta=rutinas">Rutinas</a>
                    <a href="indice.php?ruta=dietas">Dietas</a>
                    <a href="indice.php?ruta=logout">Logout</a>
                </ul>
               
            </div>
        </nav>
    </header>

    <main class="contenido-principal">
       <div class="contenedor">
            <div class="cabecera-guion">
                <h1><i class="fas fa-plus-circle"></i>Crear nueva dieta</h1>
            </div>
            <div class="form-contenedor">
                <form action="indice.php?ruta=guardar_dieta" method="POST" class="formulario">
                   
                    <div class="grupo-formulario">
                        <label for="titulo" class="etiqueta-formulario">Titulo de la dieta: </label>
                      <input type="text" id="titulo" name="titulo" class="control-formulario" required placeholder="ej:Dieta para deficit calorico...">
                    </div>

                    <div class="grupo-formulario">
                        <label for="descripcion" class="etiqueta-formulario">Descripcion de la dieta: </label>
                        <textarea  id="descripcion" name="descripcion" class="control-formulario" rows="6" placeholder="Describe tus objetivos, los alimentos que recomiendas..."></textarea>
                    </div>

                    <div class="grupo-formulario">
                        <label for="imagen_url" class="etiqueta-formulario">URL de la imagen (opcional) </label>
                        <input type="url" id="imagen_url" name="imagen_url" class="control-formulario" placeholder="https://ejemplo.com/mi-imagen.png">
                    </div>
                    

                    <div class="grupo-formulario">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar Dieta
                        </button>
                        <a href="indice.php?ruta=dietas" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        

                    </div>

                </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" ></script>

   
   
</body>
</html>