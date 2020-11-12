<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4" style="max-width: 85rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <h5 class="text-dark">Listado prestamos</h5>
        </div>
        <div class="card-body">
            <form class="" role="form" id="datos_estudiante">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Cédula o nombre</strong></label>
                    <div class="col-md-7">
                        <input type="text" id="searchusuario" class="form-control" placeholder="Cédula o nombre del usuario">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                    <span id="loader1"></span>
                </div>
            </form>

            <div class="form-group row justify-content-center">
                <div type="button" class="btn-group ">
                    <a class="btn btn-success" href="<?php echo URL . 'prestamos/create' ?>"><i class="fas fa-user-plus"></i> Nuevo prestamos</a>
                </div>
            </div>
            <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead style="font-size: 0.8rem;">
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">Cédula</th>
                            <th class="thead-fix" scope="col">Nombre</th>
                            <th class="thead-fix" scope="col">Ubicacion</th>
                            <th class="thead-fix" scope="col">Observaciones</th>
                            <th class="thead-fix" scope="col">Fecha</th>
                            <th class="thead-fix text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-prestamos-activo">

                        <?php

                        foreach ($datos as $row) {
                        ?>
                            <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                <td><strong><?php echo $row['cedula'] ?></strong></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['ubicacion'] ?></td>
                                <td><?php echo $row['observaciones'] ?></td>
                                <td><span class="badge badge-secondary"><?php echo $row['fecha'] ?></span></td>
                                <td class="text-center">
                                    <a href="<?php echo URL ?>prestamos/show/<?php echo $row['id'] ?>" class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo URL ?>prestamos/editar/<?php echo $row['id'] ?>" class="btn btn-info border"><i class="fas fa-cogs"></i></a>
                                    <a href="<?php echo URL ?>prestamos/delete/<?php echo $row['id'] ?>" class="btn btn-danger border"><i class="fas fa-trash-alt"></i></a>
                                    <a href="<?php echo URL . 'prestamos/ReportePrestamo/'.  $row['id'] ?>" target="blank" class="btn btn-light border"><i class="fas fa-file-pdf"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>