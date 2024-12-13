<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $conexion = new Conexion();
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, password) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->conexion->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $password);

    if ($stmt->execute()) {
        header("Location: ../../view/usuarios/admin_Usuarios.php?mensaje=Usuario creado exitosamente");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->conexion->close();
}
?>