CREATE DATABASE muscleon CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;

USE muscleon;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellidos VARCHAR(80),
    email VARCHAR(100) UNIQUE,
    contrasena_hasheada VARCHAR(255),
    tipo ENUM('usuario','admin') DEFAULT 'usuario',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ejercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    grupo_muscular VARCHAR(50),
    imagen_url VARCHAR(255),
    video_url VARCHAR(255)
);


CREATE TABLE rutinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    nombre VARCHAR(100),
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE dietas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    descripcion TEXT,
    imagen_url VARCHAR(255)
);

CREATE TABLE rutina_ejercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rutina_id INT,
    ejercicio_id INT,
    series INT,
    repeticiones INT,
    peso DECIMAL(5,2),
    tiempo_descanso INT,

    FOREIGN KEY (rutina_id) REFERENCES rutinas(id) ON DELETE CASCADE,

    FOREIGN KEY (ejercicio_id) REFERENCES ejercicios(id) ON DELETE CASCADE
);

CREATE TABLE historial_entrenamiento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    rutina_id INT,
    fecha DATE,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,

    FOREIGN KEY (rutina_id) REFERENCES rutinas(id) ON DELETE CASCADE
);

CREATE TABLE historial_entrenamiento_detalles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    historial_entrenamiento_id INT,
    ejercicio_id INT,
    series_completadas INT,
    repeticiones_completadas INT,
    peso_usado DECIMAL(5,2),

    FOREIGN KEY (historial_entrenamiento_id) REFERENCES historial_entrenamiento(id) ON DELETE CASCADE,

    FOREIGN KEY (ejercicio_id) REFERENCES ejercicios(id) ON DELETE CASCADE
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    contenido TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);





