<?php
require_once __DIR__ . '/carrusel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $carrusel = new Carrusel();
    if ($carrusel->eliminarImagen($id)) {
        header('Location: ../../view/carrusel/admin_carrusel.php?mensaje=Imagen eliminada exitosamente');
    } else {
        echo 'Error al eliminar la imagen';
    }
}
?>