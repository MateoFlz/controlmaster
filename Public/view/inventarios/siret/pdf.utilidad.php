<html>

<head>
    <title>Sistema integrado del prestamo - Lista utilidades</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css' ?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css' ?>">
</head>

<body>
    <img src="<?php echo URL; ?>Public/assets/icons/logocorposucre.png" width="290" height="90">
    <p class="float-right font-weight-bold"><?php echo date('yy/m/d'); ?></p>

    <h4 class="text-center">Lista de utilidades registrados</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="th-class">
                <th class="thead-fix" scope="col">ID</th>
                <th class="thead-fix" scope="col">Etiqueta</th>
                <th class="thead-fix" scope="col">Marca</th>
                <th class="thead-fix" scope="col">Cantidad</th>
                <th class="thead-fix" scope="col">Ubicacion</th>
                <th class="thead-fix" scope="col">Estado</th>
            </tr>
        </thead>
        <tbody style="font-size: 0.8rem;">
            <?php
            foreach ($datos as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td class="text-center"><?php echo $row['cantidad'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['estado'] ?></td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>