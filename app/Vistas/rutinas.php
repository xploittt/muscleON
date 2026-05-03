<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <title>RUTINAS</title>
</head>
<body>
    <h1>RUTINAS</h1>
    <a href="indice.php?ruta=dashboard">Volver</a>


    <h2>CREAR RUTINA</h2>
    <form action="indice.php?ruta=guardar_rutina" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <textarea name="descripcion" placeholder="Descripcion" ></textarea>
        <button type="submit">Guardar</button>
    </form>

    <h2>MIS RUTINAS</h2>
    <?php foreach($rutinas as $r):?> 
        <div style="border: 1px solid #ccc; padding:10px; margin:10px 0;">
            <h3><?=htmlspecialchars($r["nombre"])?></h3>
            <p><?=htmlspecialchars($r["descripcion"])?></p>

            <h4>EJERCICIOS</h4>
            <ul>
                <?php if(!empty($ejerciciosPorRutina[$r["id"]])):?>
                    <?php foreach($ejerciciosPorRutina[$r["id"]] as $er):?>
                        <li>
                            <?=htmlspecialchars($er["ejercicio_nombre"])?>-Series <?=(int)$er["repeticiones"]?>
   
                        </li>
            </ul>
        </div>
        <!-- TODO: Por completar -->
</body>
</html>