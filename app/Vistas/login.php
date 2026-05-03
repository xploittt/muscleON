<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-MuscleON</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
</head>
<body>
    <div class="formulario-auth">
        <div class="contenedor-auth">
            <div class="logo">
                MuscleON
            </div>
            <h2>Iniciar Sesión</h2>

            <form action="indice.php?ruta=autenticar" method="POST">
                <div class="grupo-form-auth">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required class="control-formulario-auth">
                </div>

                <div class="grupo-form-auth">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="contrasena" placeholder="Contraseña" required class="control-formulario-auth">
                </div>

                <div class="grupo-form-auth">
                    <button type="submit" class="boton-auth">Iniciar Sesión</button>
                </div>
            </form>
            
            <div class="enlaces-auth">
                <p>¿No tienes cuenta aún? <a href="indice.php?ruta=registro">Regístrate aquí</a></p>
            </div>
        </div>
    </div>
    <script src="../publica/js/main.js"></script>
</body>
</html>