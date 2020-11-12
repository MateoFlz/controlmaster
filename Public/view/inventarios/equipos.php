<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>

            <h5 class="text-dark">Lista registro de equipos tecnologicos</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                if (strpos($fullUrl, "editar") !=  true) {
                    include_once 'siret/crear.php';
                } else {
                    include_once 'siret/editar.php';
                }
                ?>
                <div class="col-md-8">
                    <div class="card">
                        <?php

                        if (strpos($fullUrl, "delete=true") ==  true) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Equipo eliminado satifactoriamente.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }

                        if (strpos($fullUrl, "delete=false") ==  true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ocurrio un error al equipo el portail.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>
                        <div class="card-header">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar por codigo o descripcion" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                                </div>
                                <div class="input-group-append">
                                    <a class="btn btn-light border" href="<?php echo URL . 'inventarios/ReporteEquipos' ?>" target="blank"><i class="fas fa-file-pdf"></i> PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" style="max-height: 340px">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Serial</th>
                                            <th class="thead-fix" scope="col">Etiqueta</th>
                                            <th class="thead-fix" scope="col">Marca</th>
                                            <th class="thead-fix" scope="col">Ubicacion</th>
                                            <th class="thead-fix" scope="col">Estado</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-equipos">
                                        <?php

                                        if (strpos($fullUrl, "editar") !=  true) {

                                            foreach ($datos['equipos'] as $row) {
                                        ?>
                                                <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                    <td><?php echo $row['serial'] ?></td>
                                                    <td><?php echo $row['descripcion'] ?></td>
                                                    <td><?php echo $row['marca'] ?></td>
                                                    <td><?php echo $row['nombre'] ?></td>
                                                    <td><?php echo $row['estado'] ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" id="show_equipo" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-eye"></i></button>
                                                        <a href="<?php echo URL . "inventarios/editar/" . $row['id']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo URL . "inventarios/delete/" . $row['id']; ?>" method="post" style="display: inline">
                                                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php

                                            }
                                        } else {
                                            $rows = $datos['equipos'];

                                            foreach ($rows as $row) {
                                            ?>
                                                <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                    <td><?php echo $row['serial'] ?></td>
                                                    <td><?php echo $row['descripcion'] ?></td>
                                                    <td><?php echo $row['marca'] ?></td>
                                                    <td><?php echo $row['nombre'] ?></td>
                                                    <td><?php echo $row['estado'] ?></td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary" id="show_equipo" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="fas fa-eye"></i></button>
                                                        <a href="<?php echo URL . "inventarios/editar/" . $row['id']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                        <form action="<?php echo URL . "inventarios/delete/" . $row['id']; ?>" method="post" style="display: inline">
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
<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Informacion del equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="border rounded">
                    <table class="m-4">
                        <thead class="">
                            <tr>

                                <th scope="row" class="p-3">
                                    Serial
                                    <input type="text" class="form-control" id="eq_serial" value="" onkeydown="return false">
                                </th>


                                <th scope="row" class="p-3">
                                    Marca
                                    <input type="text" class="form-control" id="eq_marca" value="" onkeydown="return false">
                                </th>
                                <th scope="row" class="p-3">
                                    Modelo
                                    <input type="text" class="form-control" id="eq_modelo" value="" onkeydown="return false">
                                </th>
                            </tr>

                            <tr>

                                <th scope="row" class="p-3" colspan="3">
                                    Descripcion
                                    <textarea onkeydown="return false" class="form-control" rows="2" id="eq_descripcion"></textarea>
                                </th>

                            </tr>
                            <tr>
                                <th scope="row" class="p-3">
                                    Tipo
                                    <input type="text" class="form-control" id="eq_tipo" value="" onkeydown="return false">
                                </th>

                                <th scope="row" class="p-3">
                                    Sede
                                    <input type="text" class="form-control" id="eq_sede" value="" onkeydown="return false">
                                </th>
                                <th scope="row" class="p-3">
                                    Ubicacion
                                    <input type="text" class="form-control" id="eq_ubicacion" value="" onkeydown="return false">
                                </th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>