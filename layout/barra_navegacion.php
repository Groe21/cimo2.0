<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
    <img src="<?php echo BASE_URL; ?> /assets/img/logocimo.ico" alt="Logo" class="navbar-logo">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?> /index.php">Cimo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/view/aplicaciones/aplicar_Bacante.php">Bolsa de empleo</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownNoticia" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Noticias</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownNoticia">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/view/noticias/admin_Noticias.php">Administrar Noticias</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/view/noticias/noticias.php">Noticias Creadas</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownEmpleo" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Bolsa de Empleo</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownEmpleo">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/view/empleos/admin_Empleos.php">Crear Empleo</a></li>
                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/view/aplicaciones/admin_Aplicaciones.php">Mostrar Vacantes</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownUsuarios" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUsuarios">
                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/view/usuarios/admin_Usuarios.php">Administrar Usuarios</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownCarrusel" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Carrusel</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownCarrusel">
                    <li><a class="dropdown-item" href="#">Imágenes Carrusel</a></li>
                </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/models/usuario/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/login.php">Login</a></li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>