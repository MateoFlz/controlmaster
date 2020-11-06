<html>

<head>
    <title>Sistema integrado del prestamo - Lista invitados</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css' ?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css' ?>">
</head>

<body>
    <img src="<?php echo URL; ?>Public/assets/icons/logocorposucre.png" width="290" height="90">
    <p class="float-right font-weight-bold"><?php echo date('yy/m/d'); ?></p>

    <h4 class="text-center">Lista de invitados registrados</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="th-class">
                <th class="thead-fix" scope="col">Cédula</th>
                <th class="thead-fix" scope="col">Nombre Completo</th>
                <th class="thead-fix" scope="col">Telefono</th>
                <th class="thead-fix" scope="col">Destalles</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($datos as $row) {
            ?>
                <tr>
                    <td><?php echo $row['cedula'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['detalles'] ?></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>

</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>