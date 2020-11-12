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
        <span class=""><strong>Nombre solicitante:</strong>
            <?php if ($datos_equipos) {
                echo $datos_equipos[0]['nombre'];
            } else {
                echo $datos_utilidad[0]['nombre'];
            }
            ?>
        </span><br>
        <span class=""><strong>Ubicacion: </strong>
            <?php if ($datos_equipos) {
                echo $datos_equipos[0]['ubicacion'];
            } else {
                echo $datos_utilidad[0]['ubicacion'];
            }
            ?>
        </span><br>
        <span class=""><strong>Observacion: </strong>
            <?php if ($datos_equipos) {
                echo $datos_equipos[0]['observaciones'];
            } else {
                echo $datos_utilidad[0]['observaciones'];
            }
            ?>
        </span>
    </div>
    <span class=""><strong>Hora de entrega: </strong>
        <?php if ($datos_equipos) {
            echo $datos_equipos[0]['fecha_entrega'];
        } else {
            echo $datos_utilidad[0]['fecha_entrega'];
        }
        ?>
    </span>
    <?php
    if ($datos_equipos && $datos_utilidad) {

    ?>
    <br>
    TABLA DE EQUIPOS
        <table class="table table-bordered table-sm">
            <thead>
                <?php
                if ($datos_equipos) {
                ?>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Detalle</th>
                    </tr>
                <?php
                }
                ?>

            </thead>
            <tbody>
                <?php
                foreach ($datos_equipos as $row) {
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
        <br>
        TABLA DE UTILIDADES
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos_utilidad as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>

                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['marca'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['cantidad'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
    
        <table class="table table-bordered table-sm">
            <thead>
                <?php
                if ($datos_equipos) {
                ?>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Detalle</th>
                    </tr>
                <?php
                } else if ($datos_utilidad) {
                ?>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                <?php
                }
                ?>

            </thead>
            <tbody>
                <?php
                if ($datos_equipos) {
                    foreach ($datos_equipos as $row) {
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
                } else if ($datos_utilidad) {
                    foreach ($datos_utilidad as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>

                            <td><?php echo $row['tipo'] ?></td>
                            <td><?php echo $row['marca'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['cantidad'] ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    <?php
    }

    ?>
</body>
<script src="<?php echo URL . 'Public/assets/js/bootstrap.min.js' ?>"></script>

</html>