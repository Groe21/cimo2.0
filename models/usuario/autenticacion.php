<?php
require_once '../../config/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usuario']) && isset($_POST['pass'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['pass'];

        $conexion = new Conexion();
        $sql = "SELECT * FROM usuarios WHERE nombre = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario'] = $user['nombre'];
            header("Location: ../../index.php");
        } else {
            header("Location: ../../login.php?error=Usuario o contraseña incorrectos");
        }

        $stmt->close();
        $conexion->conexion->close();
    } else {
        header("Location: ../../login.php?error=Todos los campos son obligatorios");
    }
}
?>