CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL
);
INSERT INTO usuarios (nombre, apellido, password, correo) 
VALUES ('Emilio', 'Guerrero', '12345', 'guerreroemilio001@gmail.com');
CREATE TABLE noticias (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha DATETIME NOT NULL
);