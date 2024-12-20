<?php
require_once __DIR__ . '/carrusel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
    $imagen = '../../uploads/' . basename($_FILES['imagen']['name']);
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
        $carrusel = new Carrusel();
        if ($carrusel->agregarImagen($imagen)) {
            header('Location: ../../view/carrusel/admin_carrusel.php?mensaje=Operación realizada con éxito');
        } else {
            echo 'Error al agregar la imagen';
        }
    } else {
        echo 'Error al subir la imagen';
    } 
}
?>