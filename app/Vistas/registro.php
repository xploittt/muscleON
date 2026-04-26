<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro-MuscleON</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
</head>
<body>
    <div class="auth-form">
        <h2>Registro de Usuarios</h2>

        <form action="indice.php?ruta=guardar_usuario" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Tu nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" placeholder="Tus apellidos" required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label><br> 
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group">
            
                <label for="contrasena">Contraseña:</label><br>
                <input type="password" name="contrasena" placeholder="Contraseña" required id="password">
                <div class="password-strength">
                    <div class="password-strength-bar" id="password-strength"></div>
                </div>
                <div class="password-strength-text" id="password-strength-text"></div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primario">Registrarse</button>
            </div>
        </form>
      
    </div>
    <script src="../publica/js/main.js"></script>
</body>
</html>