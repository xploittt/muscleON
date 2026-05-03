<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro-MuscleON</title>
    <link rel="stylesheet" href="../publica/css/estilos.css">
</head>
<body>
    <div class="formulario-auth">
        <div class="contenedor-auth">
            <div class="logo">
                MuscleON
            </div>
            <h2>Registro de Usuarios</h2>

            <form action="indice.php?ruta=guardar_usuario" method="POST">
                <div class="fila-form">
                    <div class="grupo-form-auth">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" placeholder="Tu nombre" required class="control-formulario-auth">
                    </div>

                    <div class="grupo-form-auth">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" placeholder="Tus apellidos" required class="control-formulario-auth">
                    </div>
                </div>

                <div class="grupo-form-auth">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" required class="control-formulario-auth">
                </div>

                <div class="grupo-form-auth">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" name="contrasena" placeholder="Contraseña" required id="password" class="control-formulario-auth">
                    <div class="indicador-fuerza">
                        <div class="barra-fuerza" id="password-strength"></div>
                    </div>
                    <div class="texto-fuerza" id="password-strength-text"></div>
                </div>

                <div class="grupo-form-auth">
                    <button type="submit" class="boton-auth">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../publica/js/main.js"></script>
</body>
</html>