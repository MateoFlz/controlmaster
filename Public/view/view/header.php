<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema integrado de prestamo</title>
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/jquery-ui.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/font-awesome/css/all.min.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/fullcalendar/main.min.css'?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand text-white" href="<?php echo URL . 'dashboard'?>"><img src="" alt="">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""><i class="fas fa-user-plus"></i> Usuarios<span class="sr-only">(current)</span></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo URL . 'estudiantes'?>"><i class="fas fa-user-graduate"></i> Estudiantes</a>
                    <a class="dropdown-item" href="<?php echo URL . 'docentes'?>"><i class="fas fa-chalkboard-teacher"></i> Docentes</a>
                    <a class="dropdown-item" href="<?php echo URL . 'administrativos'?>"><i class="fas fa-user-tie"></i> Administrativos</a>
                    <a class="dropdown-item" href="<?php echo URL . 'otros'?>"><i class="fas fa-user"></i> Otros</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-desktop"></i> Recursos Educativos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo URL . 'inventarios/siret/index'?>"><i class="fas fa-boxes"></i> Inventario</a>
                    <a class="dropdown-item" href="<?php echo URL . 'prestamos/index'?>"><i class="fas fa-hand-holding"></i> Prestamos</a>
                
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-vial"></i> Laboratorios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo URL . 'inventarios/laboratorios/index'?>"><i class="fas fa-boxes"></i> Inventario</a>
                    <a class="dropdown-item" href="<?php echo URL . 'inventarios/laboratorios/reservas'?>"><i class="fas fa-calendar-check"></i> Reservas</a>
                    <a class="dropdown-item" href=""><i class="fas fa-clipboard-check"></i> Asignaciones</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav mr-5">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="" alt="">
                    <?php
                    echo $_SESSION['name'];
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo URL . 'perfil'?>"><i class="fas fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="<?php echo URL . 'configuracion'?>"><i class="fas fa-cogs"></i> Configuracion</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URL . 'index/logout'?>"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>