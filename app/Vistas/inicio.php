<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>muscleON Fitness</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">

</head>
<body>
    <header class="hero">
        <nav class="navbar">
            <div class="nav-container">
                <div class="logo">
                    <i class="fa-solid fa-dumbbell"></i>
                    <span>muscleON</span>
                </div>
                <div class="nav-links">
                    <a href="indice.php?ruta=inicio" class="active">Inicio</a>
                    <a href="#features">Caracteristicas</a>
                    <a href="#about">Sobre Nosotros</a>
                    <a href="indice.php?ruta=login" class="btn btn-outline">Iniciar Sesion</a>
                    <a href="indice.php?ruta=registro" class="btn btn-primary">Registrarse</a>
                </div>
                <div class="hamburguer">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
        <div class="hero-content">
            <h1>Transforma tu Cuerpo</h1>
            <p>La aplicacion completa para gesitionar tu rutina de entrenamiento, dietas y seguimiento de progreso</p>
            <div class="hero-buttons">
                <a href="indice.php?ruta=registro" class="btn btn-primary btn-large">Comenzar Gratis</a>
                <a href="#features" class="btn btn-outline btn-large">Saber mas</a>
            </div>
        </div>
    </header>
    <main> 
        <section id="features" class="features">
            <div class="container">
                <h2>Caracteristicas Principales</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h3>Rutinas Personalizadas</h3>
                        <p>Crea y sigue rutinas de entrenamiento adaptadas a tus objetivos y nivel de condicion fisica</p>
                    </div>
                     <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h3>Plan Nutricional</h3>
                        <p>Accede a dietas balanceadas y planes nutricionales diseñado por expertos</p>
                    </div>
                     <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Seguimiento de Progreso</h3>
                        <p>Monitorea tu evolucion con estadisticas detalladas y graficos de progreso</p>
                    </div>
                     <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <h3>Base de Ejercicios</h3>
                        <p>Accede a cientos de ejercicios con videos instructivos y guias detalladas</p>
                    </div>
                     <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Comunidad Activa</h3>
                        <p>Conecta con otros deportistas, comparte logros y obten motivacion</p>
                    </div>
                     <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Acceso Movil</h3>
                        <p>Lleva tu entrenamiento a cualquier lugar con nuestra version movil</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>Sobre muscleON</h2>
                        <p>muscleON nace de la necesidad de ofrecer una solucion para todos aquellos que buscan mejorar su condicion fisica de manera profesional y personalizada</p>
                        <p>Nuestra plataforma combina la tecnologia mas avanzada, con conocimientos de expertos en FITNESS y NUTRICION para ofrecerte la mejor experiencia en tu viaje hacia un estilo de vida mas saludable</p>
                        <div class="stats">
                            <div class="stat">
                                <h3>10000+</h3>
                                <p>Usuarios Activos</p>
                            </div>
                             <div class="stat">
                                <h3>500+</h3>
                                <p>Ejercicios</p>
                            </div>
                             <div class="stat">
                                <h3>100+</h3>
                                <p>Rutinas</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-image">
                        <img src="../../publica/imagenes/gimnasio.jpg" alt="gimnasio">
                    </div>
                </div>
            </div>
        </section>
        
        <section class="testimonials">
            <div class="container">
                <h2>Lo que dicen nuestros usuarios</h2>
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"muscleON a cambiado completamente mi forma de entrenar. Las rutinas son increibles y el seguimiento me mantiene motivado!</p>
                        <div class="testimonial-author">
                            <img src="../../publica/imagenes/resena1.avif" alt="usuario">
                            <div>
                                <h4>Monica Perez</h4>
                                <p>Atleta</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
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
                <div class="footer-section">
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

                        <li>
                            <a href="#features">Caracteristicas</a>
                        </li>
                    </ul>
                </div>    

                <div class="footer-section">
                    <h4>Soporte</h4>
                    <ul>
                        <li>
                            <a href="#">Ayuda</a>
                        </li>

                        <li>
                            <a href="#">Contacto</a>
                        </li>

                        <li>
                            <a href="#">Privacidad</a>
                        </li>

                        <li>
                            <a href="#">Terminos</a>
                        </li>

                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Contacto</h4>
                    <p><i class="fas fa-envelope"></i>info@muscleon.com</p>
                    <p><i class="fas fa-phone"></i>661 46 14 45</p>
                    <p><i class="fas fa-map-marker-alt"></i>Bilbao, España</p>

                </div>


            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 muscleON. Todos los derechos reservados</p>
            </div>
        </div>
    </footer>

    <script src="../publica/js/main.js"></script>
</body>
</html>