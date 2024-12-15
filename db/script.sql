--
-- Estructura de la tabla "usuarios"
--
CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL
);

--
-- Datos iniciales para la tabla "usuarios"
--
INSERT INTO usuarios (nombre, apellido, password, correo) 
VALUES ('Emilio', 'Guerrero', '12345', 'guerreroemilio001@gmail.com');

--
-- Estructura de la tabla "noticias"
--
CREATE TABLE noticias (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255) NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    fecha DATETIME NOT NULL
);

--
-- Estructura de la tabla "empleos"
--
DROP TABLE IF EXISTS `empleos`;
CREATE TABLE `empleos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `puesto` NVARCHAR(255) NOT NULL,
  `ubicacion` NVARCHAR(255) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `requisitos` TEXT NOT NULL,
  `fecha_publicacion` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de la tabla "aplicar_empleo"
--
DROP TABLE IF EXISTS `aplicar_empleo`;
CREATE TABLE `aplicar_empleo` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `empleo_id` INT NOT NULL,
  `nombre_candidato` NVARCHAR(255) NOT NULL,
  `email` NVARCHAR(255) NOT NULL,
  `telefono` NVARCHAR(50) NOT NULL,
  `cv_url` NVARCHAR(255) NOT NULL,
  `fecha_aplicacion` DATE NOT NULL,
  FOREIGN KEY (`empleo_id`) REFERENCES `empleos`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;