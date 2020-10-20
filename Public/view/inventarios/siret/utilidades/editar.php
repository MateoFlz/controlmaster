<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Editar utilidad
        </div>
        <div class="card-body">
            <?php
            $row = $datos['utilidadforid']->fetchAll(\PDO::FETCH_ASSOC);
            $codigo = explode('-', $row[0]['codigo']);
            if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Utilidad actualizada satifactoriamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }

            if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocurrio un error al actualizar el utilidad.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
            
            }
            ?>
            <form action="<?php echo URL . "inventarios/siret/utilidades/update/" . $row[0]['idutilida']; ?>" method="post">
                <input type="hidden" name="idutilida" value="<?php echo $row[0]['idutilida']?>">
                <div class="form-group row">

                    <div class="col">
                        <label for="cod1" class="control-label">Codigo asignacion</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cod1" value="PTL-" readonly required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="cod2" value="<?php echo $codigo[1];?>" placeholder="Codigo" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="iddescripcion" id="exampleFormControlTextarea1" rows="2"><?php echo $row[0]['descripcion']?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="cantidad" class="control-label">Cantidad</label>
                        <input type="number" class="form-control input-sm" id="cantidad" name="cantidad" value="<?php echo $row[0]['cantidad']?>" placeholder="Cantidad">
                    </div>
                    <div class="col-md-12">
                        <label for="fecha" class="control-label">Fecha</label>
                        <input type="date" class="form-control input-sm" id="fecha" name="fecha" value="<?php echo $row[0]['fecha']?>" placeholder="Segundo nombre">
                    </div>
                    <div class="col-md-12">
                        <label for="idnombre2" class="control-label">Estado</label>
                        <select name="activo" class="form-control">
                            <option value="1" <?php if($row[0]['activo'] == '1'){ echo 'selected';} ?>>Activo</option>
                            <option value="0" <?php if($row[0]['activo'] == '0'){ echo 'selected';} ?>>Inactivo</option>
                        </select>
                    </div>
                    <div class="col text-center">
                        <br>
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>