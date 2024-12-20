<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['puesto']) && isset($_POST['ubicacion']) && isset($_POST['descripcion']) && isset($_POST['requisitos']) && isset($_POST['fecha_publicacion'])) {
        $puesto = $_POST['puesto'];
        $ubicacion = $_POST['ubicacion'];
        $descripcion = $_POST['descripcion'];
        $requisitos = $_POST['requisitos'];
        $fecha_publicacion = $_POST['fecha_publicacion'];

        $conexion = new Conexion();
        $sql = "INSERT INTO empleos (puesto, ubicacion, descripcion, requisitos, fecha_publicacion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("sssss", $puesto, $ubicacion, $descripcion, $requisitos, $fecha_publicacion);

        if ($stmt->execute()) {
            header("Location: ../../view/empleos/admin_empleos.php?mensaje=Operación realizada con éxito");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conexion->conexion->close();
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>