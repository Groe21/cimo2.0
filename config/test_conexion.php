<?php
// Incluir el archivo de conexión
include 'Conexion.php';

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Verificar si la conexión fue exitosa
if ($conexion->conexion) {
    echo "Conexión exitosa";
    $conexion->conexion->close(); // Cerrar la conexión
} else {
    echo "Error en la conexión";
}
?>