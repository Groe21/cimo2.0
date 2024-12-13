<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $conexion = new Conexion();
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ../../view/usuarios/admin_Usuarios.php?mensaje=Usuario eliminado exitosamente");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conexion->conexion->close();
    } else {
        echo "Error: ID de usuario no proporcionado.";
    }
}
?>