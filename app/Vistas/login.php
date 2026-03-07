<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-MuscleON</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
</head>
<body>
    <div class="auth-form">
        <h2>Iniciar Sesion</h2>

        <form action="indice.php?ruta=autenticar" method="POST">
            <div class="form-group">
                <label for="email">Email:</label><br> 
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
            
                <label for="contrasena">Contraseña:</label><br>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </div>
        </form>
        <div class="auth-links">
            <p>No tienes cuenta aun? <a href="indice.php?ruta=registro">Registrate aqui!</a></p>
        </div>
    </div>
    <script src="../publica/js/main.js"></script>
</body>
</html>