<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-MuscleON</title>
    <link rel="stylesheet" href="../../publica/css/estilos.css">
</head>
<body>
    <h2>Iniciar Sesion</h2>

    <form action="indice.php?ruta=autenticar" method="POST">

        <label for="email">Email:</label><br>
        <input type="email" name="email" placeholder="email" required>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" name="contrasena" placeholder="Contraseña" required>

        <button type="submit">Iniciar Sesion</button>

    </form>
</body>
</html>