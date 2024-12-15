<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['empleo_id']) && isset($_POST['nombre_candidato']) && isset($_POST['email']) && isset($_POST['telefono']) && isset($_FILES['cv'])) {
        $empleo_id = $_POST['empleo_id'];
        $nombre_candidato = $_POST['nombre_candidato'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        // Manejar la subida del CV
        $target_dir = "../../uploads/cv/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        $cv_url = "uploads/cv/" . basename($_FILES["cv"]["name"]);

        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
            $fecha_aplicacion = date('Y-m-d');

            $conexion = new Conexion();
            $sql = "INSERT INTO aplicar_empleo (empleo_id, nombre_candidato, email, telefono, cv_url, fecha_aplicacion) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->conexion->prepare($sql);
            $stmt->bind_param("isssss", $empleo_id, $nombre_candidato, $email, $telefono, $cv_url, $fecha_aplicacion);

            if ($stmt->execute()) {
                header("Location: ../../view/aplicaciones/aplicar_bacante.php?mensaje=Aplicación enviada exitosamente");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conexion->conexion->close();
        } else {
            echo "Error al subir el CV.";
        }
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>