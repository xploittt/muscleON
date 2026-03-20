<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../publica/css/estilos.css">
    <title>EJERCICIOS</title>
</head>
<body>
    <h1>EJERCICIOS</h1>
    <form action="indice.php?ruta=guardar_ejercicio" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="grupo_muscular" placeholder="Grupo Muscular" required>
        <input type="text" name="Descripcion" placeholder="Descripcion" required>
        <input type="text" name="imagen_url" placeholder="Imagen URL">
        <input type="text" name="video_url" placeholder="Video URL">
        <button type="submit">Guardar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ejercicios as $e):?>
                <tr>
                    <td><?=htmlspecialchars($e["nombre"])?></td>
                    <td><?=htmlspecialchars($e["grupo_muscular"])?></td>
                    <td><?=htmlspecialchars($e["descripcion"])?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>