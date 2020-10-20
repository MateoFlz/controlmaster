<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/siret/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Lista de registro de video beam</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                if (strpos($fullUrl, "editar") !=  true) {
                    include_once 'video/crear.php';
                } else {
                    include_once 'video/editar.php';
                }
                ?>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar por codigo o descripcion" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 340px">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Numero</th>
                                            <th class="thead-fix" scope="col">Descripcion</th>
                                            <th class="thead-fix" scope="col">Estado</th>
                                            <th class="thead-fix" scope="col">Fecha</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-audio">
                                        <?php

                                        if (strpos($fullUrl, "editar") !=  true) {

                                            foreach ($datos as $row) {
                                        ?>
                                                <tr <?php echo 'respon="' . $row['idvideo'] . '"' ?>>
                                                    <td><?php echo $row['codigo'] ?></td>
                                                    <td><?php echo $row['descripcion'] ?></td>
                                                    <td><?php echo $row['estado'] ?></td>
                                                    <td><?php echo $row['fecha'] ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                        <a href="<?php echo URL . "inventarios/siret/videobeam/editar/" . $row['idvideo']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo URL . "inventarios/siret/videobeam/delete/" . $row['idvideo']; ?>" method="post" style="display: inline">
                                                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php

                                            }
                                        } else {
                                            $rows = $datos['videos'];

                                            foreach ($rows->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                                            ?>
                                                <tr <?php echo 'respon="' . $row['idvideo'] . '"' ?>>
                                                    <td><?php echo $row['codigo'] ?></td>
                                                    <td><?php echo $row['descripcion'] ?></td>
                                                    <td><?php echo $row['estado'] ?></td>
                                                    <td><?php echo $row['fecha'] ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                        <a href="<?php echo URL . "inventarios/siret/videobeam/editar/" . $row['idvideo']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo URL . "inventarios/siret/videobeam/delete/" . $row['idvideo']; ?>" method="post" style="display: inline">
                                                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>