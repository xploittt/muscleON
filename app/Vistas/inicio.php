<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>muscleON - Tu Gimnasio Online</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <header class="hero">
        <nav class="barra-navegacion">
            <div class="contenedor-navegacion">
                <div class="logo">
                    <i class="fa-solid fa-dumbbell"></i>
                    <span>muscleON</span>
                </div>
                <div class="enlaces-navegacion">
                    <?php if(isset($_SESSION["usuario"])):?>
                        <a href="indice.php?ruta=inicio" class="active">Inicio</a>
                        <a href="indice.php?ruta=ejercicios">Ejercicios</a>
                        <a href="indice.php?ruta=rutinas">Rutinas</a>
                        <a href="indice.php?ruta=dietas">Dietas</a>

                        <a href="indice.php?ruta=historial">Historial</a>
                        <a href="indice.php?ruta=logout" class="btn-primario-gimnasio btn-gimnasio">
                            <i class="fas fa-sign-out-alt"></i>Salir
                        </a>
                    <?php else:?>
                        <a href="indice.php?ruta=inicio" class="active">Inicio</a>
                        <a href="#caracteristicas">Caracteristicas</a>
                        <a href="indice.php?ruta=login" class="btn-secundario-gimnasio btn-gimnasio">Iniciar Sesion</a>
                        <a href="indice.php?ruta=registro" class="btn-primario-gimnasio btn-gimnasio">Registrarse</a>
                    <?php endif;?>
                </div>
                
            </div>
        </nav>
        <div class="contenido-hero">
            <h1>Transforma tu Cuerpo</h1>
            <p>La aplicacion completa para gesitionar tu rutina de entrenamiento, dietas y seguimiento de progreso</p>
            <div class="botones-hero">
                <a href="indice.php?ruta=registro" class="btn btn-primary btn-grande">Comenzar Gratis</a>
                <a href="#caracteristicas" class="btn btn-contorno btn-grande">Saber mas</a>
            </div>
        </div>
    </header>
    <main> 
        <section id="caracteristicas" class="caracteristicas">
            <div class="contenedor">
                <h2>Caracteristicas</h2>
                <div class="rejillaj-caracteristicas">
                    <div class="tarjeta-caracteristica">
                        <div class="icono-caracteristica">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3>Rutinas Personalizadas</h3>
                        <p>Crea y sigue rutinas de entrenamiento adaptadas a tus objetivos y nivel de condicion fisica</p>
                    </div>
                     <div class="tarjeta-caracteristica">
                        <div class="icono-caracteristica">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h3>Dietas</h3>
                        <p>Accede a dietas balanceadas y planes nutricionales diseñado por expertos</p>
                    </div>
                     <div class="tarjeta-caracteristica">
                        <div class="icono-caracteristica">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Estadisticas</h3>
                        <p>Monitorea tu evolucion con estadisticas detalladas y graficos de progreso</p>
                    </div>
                     <div class="tarjeta-caracteristica">
                        <div class="icono-caracteristica">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                       
                    <h3>Ejercicios</h3>
                    </div>
                </div>
            </div>
        </section>
        
        
    </main>
    
    <footer class="pie-pagina">
        <div class="contenedor">
            <div class="pie-contenido">
                <div class="pie-seccion">
                    <div class="logo">
                        <i class="fas fa-dumbbell"></i>
                        <span>muscleON</span>
                    </div>
                    <p>Tu compañero ideal en el viaje hacia un estilo de vida mas saludable y fuerte</p>
                    <div class="social-links">
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                         <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div class="pie-seccion">
                    <h4>Enlaces Rapidos</h4>
                    <ul>
                        <li>
                            <a href="indice.php?ruta=inicio">Inicio</a>
                        </li>

                        <li>
                            <a href="indice.php?ruta=registro">Registro</a>
                        </li>

                        <li>
                            <a href="indice.php?ruta=login">Iniciar Sesion</a>
                        </li>
                    </ul>
                </div>    


                <div class="pie-seccion">
                    <h4>Contacto</h4>
                    <p><i class="fas fa-envelope"></i>info@muscleon.com</p>
                    <p><i class="fas fa-phone"></i>661 46 14 45</p>
                    <p><i class="fas fa-map-marker-alt"></i>Bilbao, España</p>

                </div>


            </div>

            <div class="pie-inferior">
                <p>&copy; 2026 muscleON. Todos los derechos reservados</p>
            </div>
        </div>
</footer>

    <script src="../publica/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>