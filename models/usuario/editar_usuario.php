<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['password'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $conexion = new Conexion();
        $sql = "UPDATE usuarios SET nombre = ?, apellido = ?, correo = ?, password = ? WHERE id = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $password, $id);

        if ($stmt->execute()) {
            header("Location: ../../view/usuarios/admin_Usuarios.php?mensaje=Operación realizada con éxito");
            exit();
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