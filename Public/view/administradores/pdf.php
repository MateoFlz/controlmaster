<html>

<head>
    <title>Sistema integrado del prestamo - Lista administradores</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css' ?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css' ?>">
</head>

<body>
   
    <img src="<?php echo URL; ?>Public/assets/icons/logocorposucre.png" width="290" height="90">
    <p class="float-right font-weight-bold"><?php echo date('yy/m/d'); ?></p>
    <h4 class="text-center">Lista de administradores registrados</h4>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="th-class">
                <th class="thead-fix" scope="col">Cédula</th>
                <th class="thead-fix" scope="col">Nombre</th>
                <th class="thead-fix" scope="col">Tipo usuario</th>
                <th class="thead-fix" scope="col">Telefono</th>
                <th class="thead-fix" scope="col">Correo</th>
                <th class="thead-fix" scope="col">Direccion</th>
            </tr>
        </thead>
        <tbody style="font-size: 0.8rem;">
            <?php
            
            foreach ($datos as $row) {
            ?>
                <tr>
                    <td><?php echo $row['cedula'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['direccion'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>