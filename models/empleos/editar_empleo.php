<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['puesto']) && isset($_POST['ubicacion']) && isset($_POST['descripcion']) && isset($_POST['requisitos']) && isset($_POST['fecha_publicacion'])) {
        $id = $_POST['id'];
        $puesto = $_POST['puesto'];
        $ubicacion = $_POST['ubicacion'];
        $descripcion = $_POST['descripcion'];
        $requisitos = $_POST['requisitos'];
        $fecha_publicacion = $_POST['fecha_publicacion'];

        $conexion = new Conexion();
        $sql = "UPDATE empleos SET puesto = ?, ubicacion = ?, descripcion = ?, requisitos = ?, fecha_publicacion = ? WHERE id = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("sssssi", $puesto, $ubicacion, $descripcion, $requisitos, $fecha_publicacion, $id);

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