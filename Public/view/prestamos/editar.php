<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'prestamos/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Registrar nuevo prestamo</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <?php
                        if (strpos($fullUrl, "delete=true") ==  true) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Portatil eliminado satifactoriamente.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }

                        if (strpos($fullUrl, "delete=false") ==  true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ocurrio un error al eliminar el portail.
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 340px">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Serial</th>
                                            <th class="thead-fix" scope="col">Marca</th>
                                            <th class="thead-fix" scope="col">Descripcion</th>
                                            <th class="thead-fix" scope="col">Tipo</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-temporal">
                                        <?php
                                        foreach ($datos['activo_equipo'] as $row) {
                                        ?>
                                            <tr <?php echo 'respon="' . $row['pequipo'] . '"' ?>>
                                                <td><?php echo $row['serial'] ?></td>
                                                <td><?php echo $row['marca'] ?></td>
                                                <td><?php echo $row['estado'] ?></td>
                                                <td><?php echo $row['tipo'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo URL . 'prestamos/delete_item/'.$row['pequipo']?>" class="btn btn-primary border" id="btn-edit-equipo"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <?php

                        if (strpos($fullUrl, "delete2=true") ==  true) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Portatil eliminado satifactoriamente.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }

                        if (strpos($fullUrl, "delete2=false") ==  true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ocurrio un error al eliminar el portail.
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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="max-height: 340px">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Marca</th>
                                            <th class="thead-fix" scope="col">Descripcion</th>
                                            <th class="thead-fix" scope="col">cantidad</th>
                                            <th class="thead-fix" scope="col">Tipo</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-temporal-utilidad">
                                        <?php
                                        foreach ($datos['activo_utilidad'] as $row) {
                                        ?>
                                            <tr <?php echo 'respon="' . $row['id'] . '"' ?>>

                                                <td><?php echo $row['marca'] ?></td>
                                                <td><?php echo $row['descripcion'] ?></td>
                                                <td><?php echo $row['cantidad'] ?></td>
                                                <td><?php echo $row['tipo'] ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary border" id="btn-tmp-delete"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div type="button" class="btn-group float-md-right">
                                <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lx"><i class="fas fa-plus-circle"></i> Agregar</button>
                            </div>
                            <div class="modal fade bd-example-modal-lx" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-equipos" role="tab" aria-controls="home">Equipos tecnologicos</a>
                                                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-video" role="tab" aria-controls="messages">Video</a>
                                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-portatil" role="tab" aria-controls="profile">Portatiles</a>
                                                        <a class="list-group-item list-group-item-action" id="list-utilida-list" data-toggle="list" href="#list-utilidad" role="tab" aria-controls="settings">Utilidades</a>
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="list-equipos" role="tabpanel" aria-labelledby="list-home-list">
                                                            <!-- AQUI VA UNA TABLA-->
                                                        </div>
                                                        <div class="tab-pane fade" id="list-portatil" role="tabpanel" aria-labelledby="list-profile-list">
                                                            <div class="col-md-12">
                                                                <div class="card">

                                                                    <?php

                                                                    if (strpos($fullUrl, "delete=true") ==  true) { ?>
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                            Portatil eliminado satifactoriamente.
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    if (strpos($fullUrl, "delete=false") ==  true) { ?>
                                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            Ocurrio un error al eliminar el portail.
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <div class="table-responsive" style="max-height: 340px">
                                                                            <table class="table table-hover table-sm" style="white-space: nowrap">
                                                                                <thead>
                                                                                    <tr class="table-success">
                                                                                        <th class="thead-fix" scope="col">Serial</th>
                                                                                        <th class="thead-fix" scope="col">Marca</th>
                                                                                        <th class="thead-fix" scope="col">Descripcion</th>
                                                                                        <th class="thead-fix" scope="col">Estado</th>
                                                                                        <th class="thead-fix text-center" scope="col">Acciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="tbody-prestamos-portatil">
                                                                                    <?php

                                                                                    foreach ($datos['portatil'] as $row) {
                                                                                    ?>
                                                                                        <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                                                            <td><?php echo $row['serial'] ?></td>
                                                                                            <td><?php echo $row['marca'] ?></td>
                                                                                            <td><?php echo $row['descripcion'] ?></td>
                                                                                            <td><?php echo $row['estado'] ?></td>
                                                                                            <td class="text-center">
                                                                                                <button id="btn_reserva" class="btn btn-primary border"><i class="fas fa-plus"></i></button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="list-video" role="tabpanel" aria-labelledby="list-messages-list">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <?php

                                                                    if (strpos($fullUrl, "delete=true") ==  true) { ?>
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                            Portatil eliminado satifactoriamente.
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    if (strpos($fullUrl, "delete=false") ==  true) { ?>
                                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            Ocurrio un error al eliminar el portail.
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <div class="table-responsive" style="max-height: 340px">
                                                                            <table class="table table-hover table-sm" style="white-space: nowrap">
                                                                                <thead>
                                                                                    <tr class="table-success">
                                                                                        <th class="thead-fix" scope="col">Serial</th>
                                                                                        <th class="thead-fix" scope="col">Marca</th>
                                                                                        <th class="thead-fix" scope="col">Descripcion</th>
                                                                                        <th class="thead-fix" scope="col">Estado</th>
                                                                                        <th class="thead-fix text-center" scope="col">Acciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="tbody-prestamos-video">
                                                                                    <?php

                                                                                    foreach ($datos['video'] as $row) {
                                                                                    ?>
                                                                                        <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                                                            <td><?php echo $row['serial'] ?></td>
                                                                                            <td><?php echo $row['marca'] ?></td>
                                                                                            <td><?php echo $row['descripcion'] ?></td>
                                                                                            <td><?php echo $row['estado_equipo'] ?></td>
                                                                                            <td class="text-center">
                                                                                                <button id="btn_reserva" class="btn btn-primary border"><i class="fas fa-plus"></i></button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="list-utilidad" role="tabpanel" aria-labelledby="list-utilida-list">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <?php

                                                                    if (strpos($fullUrl, "delete=true") ==  true) { ?>
                                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                            Portatil eliminado satifactoriamente.
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                    <?php
                                                                    }

                                                                    if (strpos($fullUrl, "delete=false") ==  true) { ?>
                                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            Ocurrio un error al eliminar el portail.
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
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">

                                                                        <div class="table-responsive" style="max-height: 340px">
                                                                            <table class="table table-hover table-sm" style="white-space: nowrap">
                                                                                <thead>
                                                                                    <tr class="table-success">
                                                                                        <th class="thead-fix" scope="col">Marca</th>
                                                                                        <th class="thead-fix" scope="col">Descripcion</th>
                                                                                        <th class="thead-fix" scope="col">Cantidad</th>
                                                                                        <th class="thead-fix" scope="col">Tipo</th>
                                                                                        <th class="thead-fix" scope="col">Estado</th>
                                                                                        <th class="thead-fix text-center" scope="col">Acciones</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody class="tbody-prestamos-utilidad">

                                                                                    <?php
                                                                                    foreach ($datos['utilidad'] as $row) {
                                                                                    ?>
                                                                                        <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                                                            <td><?php echo $row['marca'] ?></td>
                                                                                            <td><?php echo $row['descripcion'] ?></td>
                                                                                            <td><?php echo $row['cantidad'] ?></td>
                                                                                            <td><?php echo $row['tipo'] ?></td>
                                                                                            <td><?php echo $row['estado'] ?></td>
                                                                                            <td class="text-center">
                                                                                                <button id="btn_reserva_utilidad" class="btn btn-primary border"><i class="fas fa-plus"></i></button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    <?php
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            Asignacion de prestamo
                        </div>
                        <div class="card-body">

                            <?php

                            if (strpos($fullUrl, "response=true") ==  true) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Prestamo guardado satifactoriamente.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                            }

                            if (strpos($fullUrl, "response=false") ==  true) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Ocurrio un error o al guardar el prestamo.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php
                            }
                            ?>
                            <form action="<?php echo URL . "prestamos/insert_prestamo"; ?>" method="post">
                                <div class="form-group row border pt-2">
                                    <div class="col-md-12">
                                        <div class="row  mb-2">
                                            <label for="cod1" class="col control-label">Cedula:</label>
                                            <div class="col-lg-10 col-md-12 col-sm-12">
                                                <input type="text" class="form-control" id="cedula" name="cod2" value="<?php if ($datos['activo_equipo']) {
                                                                                                                            echo $datos['activo_equipo'][0]['cedula'];
                                                                                                                        } else {
                                                                                                                            echo $datos['activo_utilidad'][0]['cedula'];
                                                                                                                        } ?>" placeholder="N° documento" onkeydown="return false" required readonly>
                                                <input type="hidden" id="id_user" name="iduser">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <label for="cod1" class="col control-label">Nombre completo:</label>
                                            <div class="col-lg-8 col-md-11 col-sm-12">
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php if ($datos['activo_equipo']) {
                                                                                                                                echo $datos['activo_equipo'][0]['nombre'];
                                                                                                                            } else {
                                                                                                                                echo $datos['activo_utilidad'][0]['nombre'];
                                                                                                                            } ?>" placeholder="Nombre completo" onkeydown="return false" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row border">
                                    <div class="col-md-12">
                                        <label for="observacion" class="control-label">Observacion</label>
                                        <textarea class="form-control" name="observacion" id="exampleFormControlTextarea1" rows="2"><?php if ($datos['activo_equipo']) {
                                                                                                                                        echo $datos['activo_equipo'][0]['observaciones'];
                                                                                                                                    } else {
                                                                                                                                        echo $datos['activo_utilidad'][0]['observaciones'];
                                                                                                                                    } ?></textarea>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="selectsedesprestamo" class="control-label float-left">Sedes</label>
                                        <select class='form-control' id="selectsedesprestamoedit" name="sedes" required>
                                            <option value=""> -- : -- -- </option>

                                            <?php if ($datos['activo_equipo']) {
                                            ?>
                                                <option value="Sede A" <?php if ('Sede A' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Sede A</option>
                                                <option value="Sede B" <?php if ('Sede B' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Sede B</option>
                                                <option value="Sede C" <?php if ('Sede C' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Sede C</option>
                                                <option value="Sede E" <?php if ('Sede E' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Sede E</option>
                                                <option value="Casa blanca" <?php if ('Casa blanca' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Casa blanca</option>
                                                <option value="Consultorio Juridico" <?php if ('Consultorio Juridico' == $datos['activo_equipo'][0]['sede']) { echo 'selected';}?>>Consultorio Juridico</option>
                                            <?php
                                            }else if($datos['activo_utilidad']){
                                                ?>
                                                 <option value="Sede A" <?php if ('Sede A' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Sede A</option>
                                                <option value="Sede B" <?php if ('Sede B' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Sede B</option>
                                                <option value="Sede C" <?php if ('Sede C' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Sede C</option>
                                                <option value="Sede E" <?php if ('Sede E' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Sede E</option>
                                                <option value="Casa blanca" <?php if ('Casa blanca' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Casa blanca</option>
                                                <option value="Consultorio Juridico" <?php if ('Consultorio Juridico' == $datos['activo_utilidad'][0]['sede']) { echo 'selected';}?>>Consultorio Juridico</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ubicacionprestamo" class="control-label">Aulas</label>
                                        <select name="ubicacionprestamo" id="ubicacionprestamoedit" class="form-control" required>
                                            <option value=""> -- : -- -- </option>
                                        </select>
                                    </div>
                                    <input type="hidden" value="">
                                    <script>
                                        var ubicacions = "<?php if($datos['activo_equipo']){echo $datos['activo_equipo'][0]['idubicacion'];}else{ echo $datos['activo_utilidad'][0]['idubicacion'];}?>";
                                    </script>
                                    <div class="col text-center">
                                        <br>
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>