<html>

<head>
    <title>Sistema integrado del prestamo - Lista prestamos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css' ?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css' ?>">
</head>

<body>
    <img src="<?php echo URL; ?>Public/assets/icons/logocorposucre.png" width="290" height="90">
    <p class="float-right font-weight-bold"><?php echo date('yy/m/d'); ?></p>

    <h4 class="text-center">Lista de item prestado</h4>
    <div class="alert alert-dark col-4" role="alert">

        <span class=""><strong>Nombre solicitante:</strong> <?php echo $datos_utilidad[0]['nombre'] ?></span><br>
        <span class=""><strong>Ubicacion: </strong> <?php echo $datos_utilidad[0]['ubicacion']; ?></span><br>
        <span class=""><strong>Observacion: </strong> <?php echo $datos_utilidad[0]['observaciones']; ?></span>
    </div>
    <span class=""><strong>Hora de entrega: </strong> <?php echo $datos_utilidad[0]['fecha_entrega']; ?></span>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Serial</th>
                <th scope="col">Equipo</th>
                <th scope="col">Marca</th>
                <th scope="col">Detalle</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($datos_utilidad as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['serial'] ?></td>
                    <td><?php echo $row['tipo'] ?></td>
                    <td><?php echo $row['marca'] ?></td>
                    <td><?php echo $row['modelo'] . ' - ' . $row['descripcion'] ?></td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>