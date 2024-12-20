<?php 
    session_start();
    include_once(__DIR__ .'../../../config/config.php');
    require_once __DIR__ . '/../../models/carrusel/mostrar_carrusel.php';

    $tablaCarrusel = new TablaCarrusel();  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>admin Carrusel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?> /assets/img/logocimo.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
        <!-- Navegacion CSS -->
        <link href="../../css/navegacion.css" rel="stylesheet" />
         <!-- Font Awesome -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once(__DIR__ .'../../../layout/barra_navegacion.php'); ?>

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                <?php $tablaCarrusel->mostrarTablaCarrusel(); ?>
                </div>
            </section>
        </main>
        <!-- modales-->
        <?php include_once(__DIR__ .'/modales.php'); ?>
        <!-- Footer-->
        <?php include_once(__DIR__ .'../../../layout/pie_pagina.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
         // Script para pasar datos al modal de edición
            $('#editarModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var imagen = button.data('imagen');
                var modal = $(this);
                modal.find('#editar-id').val(id);
            });

            // Script para pasar datos al modal de eliminación
            $('#eliminarModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                modal.find('#eliminar-id').val(id);
            });
        </script>
        <!-- Script para mostrar el modal si hay un mensaje de éxito y eliminar el parámetro de la URL -->
        <script>
            $(document).ready(function() {
                var urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('mensaje')) {
                    var mensaje = urlParams.get('mensaje');
                    if (mensaje === 'Operación realizada con éxito' || mensaje === 'Usuario creado exitosamente') {
                        $('#exitoModal').modal('show');
                        // Eliminar el parámetro de la URL
                        var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                        window.history.replaceState({path: newUrl}, '', newUrl);
                    }
                }
            });
        </script>
    </body>
</html>