<?php
require_once '../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['descripcion']) && isset($_POST['fecha'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha = $_POST['fecha'];

        // Manejar la subida de la imagen si se proporciona una nueva
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "../../uploads/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Verificar si el archivo es una imagen real
            $check = getimagesize($_FILES["foto"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    $foto = "uploads/" . basename($_FILES["foto"]["name"]);
                } else {
                    echo "Error al subir la imagen.";
                    exit();
                }
            } else {
                echo "El archivo no es una imagen.";
                exit();
            }
        } else {
            $foto = $_POST['foto_actual'];
        }

        $conexion = new Conexion();
        $sql = "UPDATE noticias SET foto = ?, titulo = ?, descripcion = ?, fecha = ? WHERE id = ?";
        $stmt = $conexion->conexion->prepare($sql);
        $stmt->bind_param("ssssi", $foto, $titulo, $descripcion, $fecha, $id);

        if ($stmt->execute()) {
            header("Location: ../../view/noticias/admin_noticias.php?mensaje=Operación realizada con éxito");
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