<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Editar audio
        </div>
        <div class="card-body">
            <?php
            $row = $datos['sonidosforid']->fetchAll(\PDO::FETCH_ASSOC);
            $codigo = explode('-', $row[0]['codigo']);
            if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Sonido actualizado satifactoriamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }

            if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocurrio un error al actualizar el sonido.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php

            }
            ?>
             <form action="<?php echo URL . "inventarios/siret/audio/update/" . $row[0]['idsonido'];?>" method="post">
             <input type="hidden" name="idsonido" value="<?php echo $row[0]['idsonido']?>">
                <div class="form-group row">
                    <div class="col">
                        <label for="idnombre1" class="control-label">Codigo asignacion</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cod1" value="AUD-" readonly required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="cod2" value="<?php echo $codigo[1];?>" placeholder="Codigo">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="idnombre1" class="control-label">Descripcion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="iddescripcion" rows="2"><?php echo $row[0]['descripcion']?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="idnombre2" class="control-label">Estado del equipo</label>
                        <select name="estado" class="form-control">
                            <option> -- Seleccione un estado -- </option>
                            <option value="Bueno" <?php if($row[0]['estado'] == 'Bueno'){ echo 'selected';} ?>>Bueno</option>
                            <option value="Defectuoso" <?php if($row[0]['estado'] == 'Defectuoso'){ echo 'selected';} ?>>Defectuoso</option>
                            <option value="Dañado" <?php if($row[0]['estado'] == 'Dañado'){ echo 'selected';} ?>>Dañado</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="fecha" class="control-label">Fecha</label>
                        <input type="date" class="form-control input-sm" id="fecha" name="fecha" value="<?php echo $row[0]['fecha']?>" placeholder="Segundo nombre">
                    </div>
                    <div class="col-md-12">
                        <label for="activo" class="control-label">Estado</label>
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