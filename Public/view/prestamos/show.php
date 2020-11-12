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
                                          
                                    </thead>
                                    <tbody class="tbody-temporal">
                                        <?php
                                        foreach ($datos['activo_equipo'] as $row) {
                                        ?>
                                            <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                                <td><?php echo $row['serial'] ?></td>
                                                <td><?php echo $row['marca'] ?></td>
                                                <td><?php echo $row['estado'] ?></td>
                                                <td><?php echo $row['tipo'] ?></td>
                                                
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
                                            <th class="thead-fix" scope="col">cantidad</th>
                                            <th class="thead-fix" scope="col">Tipo</th>
                                           
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
                                                <input type="text" class="form-control" id="cedula"  name="cod2" value="<?php if ($datos['activo_equipo']) {
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
                                                <input type="text" class="form-control" id="nombre" false" name="nombre" value="<?php if ($datos['activo_equipo']) {
                                                                                                                                echo $datos['activo_equipo'][0]['nombre'];
                                                                                                                            } else {
                                                                                                                                echo $datos['activo_utilidad'][0]['nombre'];
                                                                                                                            } ?>" placeholder="Nombre completo" onkeydown="return false" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row border pb-3">
                                    <div class="col-md-12">
                                        <label for="observacion" class="control-label">Observacion</label>
                                        <textarea class="form-control" name="observacion" id="exampleFormControlTextarea1" rows="2" onkeydown="return false"><?php if ($datos['activo_equipo']) {
                                                                                                                                        echo $datos['activo_equipo'][0]['observaciones'];
                                                                                                                                    } else {
                                                                                                                                        echo $datos['activo_utilidad'][0]['observaciones'];
                                                                                                                                    } ?></textarea>
                                    </div>
                                    <div class="col-md-6">

                                        <label for="selectsedesprestamo" class="control-label float-left">Sedes</label>
                                        <select class='form-control' id="selectsedesprestamoedit" name="sedes" required disabled>
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
                                        <select name="ubicacionprestamo" id="ubicacionprestamoedit" class="form-control" required disabled>
                                            <option value=""> -- : -- -- </option>
                                        </select>
                                    </div>
        
                                    <script>
                                        var ubicacions = "<?php if($datos['activo_equipo']){echo $datos['activo_equipo'][0]['idubicacion'];}else{ echo $datos['activo_utilidad'][0]['idubicacion'];}?>";
                                    </script>
                                   
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