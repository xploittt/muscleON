<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro-MuscleON</title>
    <link rel="stylesheet" href="../../publica/css/estilos.css">
</head>
<body>
    <h2>Registro de Usuarios</h2>

    <form action="indice.php?ruta=guardar_usuario" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" placeholder="Nombre" required>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required>

        <label for="email">Email:</label><br>
        <input type="email" name="email" placeholder="email" required>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" name="contrasena" placeholder="Contraseña" required>

        <button type="submit">Registrate</button>

    </form>
</body>
</html>