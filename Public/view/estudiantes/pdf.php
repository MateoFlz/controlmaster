<html>

<head>
    <title>Sistema integrado del prestamo - Lista estudiante</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css' ?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css' ?>">
</head>
<body>
    <img src="<?php echo URL; ?>Public/assets/icons/logocorposucre.png" width="290" height="90">
    <p class="float-right font-weight-bold"><?php echo date('yy/m/d'); ?></p>
    
    <h4 class="text-center">Lista de estudiantes registrados</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="th-class">
                <th scope="col">Cedula</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Programa</th>
                <th scope="col">Semestre</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($datos as $row) {
            ?>
                <tr class="td-class">
                    <td><?php echo $row['cedula'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td>mattteo19997@gmail.com</td>
                    <td>Calle 47 # 28 - 25</td>
                    <td ><?php echo $row['nombreprograma'] ?></td>
                    <td><?php echo $row['semestre'] ?></td>
                </tr>
            <?php
            }

            ?>

        </tbody>
    </table>

</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>