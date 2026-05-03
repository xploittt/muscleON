<?php require_once __DIR__ . "/../../app/SoftwareIntermedio/AuthMiddleware.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas de Entrenamiento - MuscleON</title>
    <link rel="stylesheet" href="../../publica/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <div class="cabecera-pagina">
                <h1><i class="fas fa-chart-line"></i>Estadisticas de Entrenamiento</h1>
                <p>Analisis detallado de tu progreso y rendimiento</p>
            </div>
            <div class="selector-periodo">
                <div class="periodo-tab">
                    <button class="tab-btn active" onclick="cambiarPeriodo('7')">
                        Ultimos 7 dias
                    </button>

                    <button class="tab-btn" onclick="cambiarPeriodo('30')">
                        Ultimos 30 dias
                    </button>

                    <button class="tab-btn" onclick="cambiarPeriodo('90')">
                        Ultimos 90 dias
                    </button>

                    <button class="tab-btn" onclick="cambiarPeriodo('365')">
                        Ultimo año
                    </button>
                </div>
            </div>  
            <div class="resumen">
                <div class="resumen-vista primary">
                    <div class="icono-resumen"><i class="fas fa-calendar-check"></i></div>
                    <div class="contenido-resumen">
                        <span class="numero-estadistico"><?php echo $estadisticas["total_entrenamientos"];?></span>
                        <span class="resumen-label">Entrenamiento Total</span>
                        <span class="cambiar-resumen positive">
                            <i class="fas fa-arrow-up"></i>
                            <?php echo $estadisticas["ultima_semana"];?> Esta Semana
                        </span>
                    </div>
                </div>

                <div class="resumen-vista succes">
                    <div class="icono-resumen"><i class="fas fa-fire"></i></div>
                    <div class="contenido-resumen">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Calorias Quemadas</span>
                        <span class="cambiar-resumen positive">
                            <i class="fas fa-arrow-up"></i>
                             +12% Respecto al mes anterior
                        </span>
                    </div>
                </div>

                <div class="resumen-vista succes">
                    <div class="icono-resumen"><i class="fas fa-clock"></i></div>
                    <div class="contenido-resumen">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Horas Totales</span>
                        <span class="cambiar-resumen positive">
                            <i class="fas fa-arrow-up"></i>
                             +5h Respecto al mes anterior
                        </span>
                    </div>
                </div>

                <div class="resumen-vista info">
                    <div class="icono-resumen"><i class="fas fa-trophy"></i></div>
                    <div class="contenido-resumen">
                        <span class="numero-estadistico">--</span>
                        <span class="resumen-label">Racha Actual</span>
                        <span class="cambiar-resumen neutral">
                            <i class="fas fa-minus"></i>
                             Manten la constancia
                        </span>
                    </div>
                </div>

            </div> 

            <div class="plantilla-graficas">
                <div class="contenido-grafica">
                    <div class="cabecera-grafica">
                        <h3><i class="fas fa-chart-bar"></i>Entrenamientos por Semana</h3>
                        <div class="controles-grafica">
                            <button class="btn-sm" onclick="cambiarTipoGrafico('bar')">Barras</button>
                            <button class="btn-sm" onclick="cambiarTipoGrafico('line')">Lineas</button>
                        </div>
                    </div>
                    <div class="plantilla-grafica">
                        <canvas id="graficaSemanal"></canvas>
                    </div>
                </div>

                <div class="contenido-grafica">
                    <div class="cabecera-grafica">
                        <h3><i class="fas fa-chart-pie"></i>Distribucion por Grupo Muscular</h3>
                        <div class="leyenda-grafica">
                           <span class="objeto-leyenda"><i class="fas fa-circle" style="color: #3498db;"></i>Pecho</span>
                           <span class="objeto-leyenda"><i class="fas fa-circle" style="color: #e74c3c;"></i>Espalda</span>
                           <span class="objeto-leyenda"><i class="fas fa-circle" style="color: #f39c12;"></i>Piernas</span>
                           
                        </div>
                    </div>
                    <div class="plantilla-grafica">
                        <canvas id="graficaMuscular"></canvas>
                    </div>
                </div>
                
            </div>

            <div class="seccion-progreso">
                <h2><i class="fas fa-chart-line"></i>Progreso de Fuerza</h2>
                <div class="plantilla-progreso">
                    <div class="item-progeso">
                        <div class="cabecera-progreso">
                            <h4>Press Banca</h4>
                            <span class="valor-progreso">+15kg</span>
                        </div>
                        <div class="barra-progreso">
                            <div class="rellenar-progreso" style="width:75%"></div>
                        </div>
                        <div class="detalles-progreso">
                            <span>60kg -> 75kg</span>
                            <span class="fecha-progreso">Ultimos 2 meses</span>
                        </div>
                    </div>

                    <div class="item-progeso">
                        <div class="cabecera-progreso">
                            <h4>Sentadilla</h4>
                            <span class="valor-progreso">+20kg</span>
                        </div>
                        <div class="barra-progreso">
                            <div class="rellenar-progreso" style="width:80%"></div>
                        </div>
                        <div class="detalles-progreso">
                            <span>80kg -> 100kg</span>
                            <span class="fecha-progreso">Ultimos 2 meses</span>
                        </div>
                    </div>

                    <div class="item-progeso">
                        <div class="cabecera-progreso">
                            <h4>Dead Lift</h4>
                            <span class="valor-progreso">+25kg</span>
                        </div>
                        <div class="barra-progreso">
                            <div class="rellenar-progreso" style="width:85%"></div>
                        </div>
                        <div class="detalles-progreso">
                            <span>100kg -> 125kg</span>
                            <span class="fecha-progreso">Ultimos 2 meses</span>
                        </div>
                    </div>

                     <div class="item-progeso">
                        <div class="cabecera-progreso">
                            <h4>Curl de Biceps</h4>
                            <span class="valor-progreso">+5kg</span>
                        </div>
                        <div class="barra-progreso">
                            <div class="rellenar-progreso" style="width:60%"></div>
                        </div>
                        <div class="detalles-progreso">
                            <span>15kg -> 20kg</span>
                            <span class="fecha-progreso">Ultimos 2 meses</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="seccion-logros">
                <h2><i class="fas fa-trophy"></i>Logros y Metas</h2>
                <div class="plantilla-logros">
                    <div class="logro-indi unlocked">
                        <div class="logro-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="contenido-logro">
                            <h4>Primer Mes</h4>
                            <p>Has completado tu primer mes de entrenamiento</p>
                            <span class="fecha-logro">30 de Abril de 2026</span>
                        </div>
                    </div>
                    
                    <div class="logro-indi unlocked">
                        <div class="logro-icon">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <div class="contenido-logro">
                            <h4>100 Entrenamientos</h4>
                            <p>Has alcanzado tus 100 sesiones de entrenamientos</p>
                            <span class="fecha-logro">5 de Mayo de 2026</span>
                        </div>
                    </div>

                    <div class="logro-indi locked">
                        <div class="logro-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="contenido-logro">
                            <h4>Consistencia Perfecta</h4>
                            <p>Entrena 5 dias seguidos</p>
                            <span class="progreso-logro">4/5 dias</span>
                        </div>
                    </div>

                    <div class="logro-indi locked">
                        <div class="logro-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="contenido-logro">
                            <h4>Maestro de Hierro</h4>
                            <p>Alcanza 250kg en Deadlift</p>
                            <span class="progreso-logro">200/250kg</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="seccion-exportacion">
                <h2><i class="fas fa-download"></i>Exportar Datos</h2>
                <div class="opciones-exportacion">
                    <button class="btn btn-primary" onclick="exportarPDF()">
                        <i class="fas fa-file-pdf"></i> Exportar como PDF
                    </button>
                    <button class="btn btn-success" onclick="exportarExcel()">
                        <i class="fas fa-file-excel"></i> Exportar como Excel
                    </button>
                    <button class="btn btn-info" onclick="exportarCSV()">
                        <i class="fas fa-file-csv"></i> Exportar como CSV
                    </button>
                </div>
            </div>

        </div>
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

                        <li>
                            <a href="#caracteristicas">Caracteristicas</a>
                        </li>
                    </ul>
                </div>    

                <div class="pie-seccion">
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
    <script>
        const weeklyData = {
            labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
            datasets: [{
                label: 'Entrenamientos',
                data: [1, 0, 1, 1, 0, 1, 1],
                backgroundColor: '#3498db',
                borderColor: '#3498db',
                borderWidth: 2
            }]
        };

        const muscleData = {
            labels: ['Pecho', 'Espalda', 'Piernas', 'Hombros', 'Brazos'],
            datasets: [{
                data: [25, 20, 30, 15, 10],
                backgroundColor: [
                    '#3498db',
                    '#e74c3c',
                    '#f39c12',
                    '#9b59b6',
                    '#2ecc71'
                ]
            }]
        };

        const weeklyChart = new Chart(document.getElementById('graficaSemanal'), {
            type: 'bar',
            data: weeklyData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        const muscleChart = new Chart(document.getElementById('graficaMuscular'), {
            type: 'doughnut',
            data: muscleData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        function cambiarPeriodo(dias){
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove("active"));
            event.target.classList.add('active');
            console.log("Cambiando a periodo de ",dias,"dias");
        }

        function cambiarTipoGrafico(tipo){
            weeklyChart.config.type=tipo;
            weeklyChart.update();
        }

        function exportarPDF(){
            window.print();
        }

        function exportarExcel(){
            showNotification("Funcion de exportacion excel en desarrollo", "info");
        }

         function exportarCSV(){
            showNotification("Funcion de exportacion CSV en desarrollo", "info");
        }

        function animateValue(element,start,end,duration){
            const range = end-start;
            const increment = range/(duration/16);
            let current = start;
            const timer = setInterval(() => {
                current += increment;
                if(current >= end){
                    current=end;
                    clearInterval(timer);
                }
                element.textContent=Math.floor(current);
            }, 16);
        }

        document.addEventListener('DOMContentLoaded',function(){
            const statNumbers=document.querySelectorAll(".numero-estadistico");
            statNumbers.forEach(stat => {
                const finalValue = stat.textContent;
                if(finalValue!=="--"){
                    animateValue(stat,0,parseInt(finalValue),1000)
                }
            })
        })


    </script>
    <script src="../../publica/js/main.js"></script>
</body>
</html>