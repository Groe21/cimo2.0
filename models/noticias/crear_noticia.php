<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['foto']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha'])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];

        // Manejar la subida de la imagen
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar si el archivo es una imagen real
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                $foto = "uploads/" . basename($_FILES["foto"]["name"]);

                $conexion = new Conexion();
                $sql = "INSERT INTO noticias (foto, titulo, descripcion, fecha) VALUES (?, ?, ?, ?)";
                $stmt = $conexion->conexion->prepare($sql);
                $stmt->bind_param("ssss", $foto, $titulo, $descripcion, $fecha);

                if ($stmt->execute()) {
                    header("Location: ../../view/noticias/admin_noticias.php?mensaje=Operación realizada con éxito");
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conexion->conexion->close();
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "El archivo no es una imagen.";
        }
    } else {
        echo "Error: Todos los campos son obligatorios.";
    }
}
?>