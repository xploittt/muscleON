<?php require_once __DIR__ . "/../SoftwareIntermedio/AuthMiddleware.php";?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dietas - MuscleON</title>
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
                <div class="enlaces-navegacion">
                    <a href="indice.php?ruta=inicio">Inicio</a>
                    <a href="indice.php?ruta=ejercicios">Ejercicios</a>
                    <a href="indice.php?ruta=rutinas">Rutinas</a>
                    <a href="indice.php?ruta=dietas" class="active">Dietas</a>
                    <a href="indice.php?ruta=historial">Historial</a>
                    <a href="indice.php?ruta=logout">Logout</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="contenido-principal">
        <div class="contenedor">
            <div class="cabecera-pagina">
                <h1><i class="fas fa-dumbbell"></i> Catálogo de Dietas</h1>
                <p>Explora y gestiona todos los planes nutricionales disponibles</p>
            </div>

            <div class="acciones-pagina">
                <a href="indice.php?ruta=crear_dieta" class="boton boton-primario">
                    <i class="fas fa-plus"></i>Nueva Dieta

                </a>
            </div>

            <div class="rejilla-caracteristicas">
                <?php if(empty($dietas)):?>
                    <div class="tarjeta-caracteristica" style="grid-column: 1 / -1; text-align: center;">
                        <i class="fas fa-apple-alt" style="font-size: 4rem; color: var(--color-texto-claro); margin-bottom: 1rem;"></i>
                        <h3>No hay dietas registradas</h3>
                        <p>Comienza agregando planes nutricionales al catálogo</p>
                    </div>
                <?php else: ?>
                    <?php foreach($dietas as $d):?>
                        <div class="tarjeta-caracteristica">
                            <div class="icono-caracteristica">
                                <i class="fas fa-apple-alt"></i>
                            </div>
                            <h3><?=htmlspecialchars($d["titulo"])?></h3>
                           
                            <p><?=htmlspecialchars(substr($d["descripcion"],0,100))?>...</p>
                            
                        
                            
                            <div class="acciones-tarjeta">
                               <a href="indice.php?ruta=dieta_detalles&id=<?= $d["id"]?>" class="boton boton-secundario btn-sm">
                                <i class="fas fa-eye"></i>Ver
                               </a>

                               <a href="indice.php?ruta=editar_dieta&id=<?= $d["id"]?>" class="boton boton-primario btn-sm">
                                <i class="fas fa-edit"></i>Editar
                               </a>

                               <a href="indice.php?ruta=eliminar_dieta&id=<?= $d["id"]?>" class="boton boton-peligro btn-sm" onclick="return confirm('Estas seguro de eliminar esta dieta?')">
                                <i class="fas fa-trash"></i>Eliminar
                               </a>


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