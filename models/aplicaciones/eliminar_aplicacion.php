<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $conexion = new Conexion();
        $sql = "DELETE FROM aplicar_empleo WHERE id = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ../../view/aplicaciones/admin_aplicaciones.php?mensaje=Aplicación eliminada exitosamente");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conexion->conexion->close();
    } else {
        echo "Error: ID de aplicación no proporcionado.";
    }
}
?>