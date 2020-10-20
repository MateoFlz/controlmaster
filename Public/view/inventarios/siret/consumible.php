<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/siret/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Lista de sonido</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Agregar audio
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <div class="col">
                                    <label for="idnombre1" class="control-label">Codigo asignacion</label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" value="AUD-" readonly required>
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Codigo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="idnombre1" class="control-label">Descripcion</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                    <label for="idnombre2" class="control-label">Estado del equipo</label>
                                        <select name="estado" class="form-control">
                                            <option> -- Seleccione un estado -- </option>
                                            <option value="1">Bueno</option>
                                            <option value="2">Defectuoso</option>
                                            <option value="3">Dañado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="idnombre2" class="control-label">Fecha</label>
                                        <input type="date" class="form-control input-sm" id="idnombre2" name="idnombre2" placeholder="Segundo nombre">
                                    </div>
                                    <!--<div class="col-md-12">
                                    <label for="idnombre2" class="control-label">Estado</label>
                                        <select name="estado" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>-->
                                    <div class="col text-center">
                                        <br>
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>

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