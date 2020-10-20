<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Agregar nuevo portatil
        </div>
        <div class="card-body">
            <?php

            if (strpos($fullUrl, "response=true") ==  true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Portatil guardado satifactoriamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }

            if (strpos($fullUrl, "response=false") ==  true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocurrio un error al guardar el portail.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
            }
            ?>
            <form action="<?php echo URL . "inventarios/siret/insert_portatil"; ?>" method="post">
                <div class="form-group row">

                    <div class="col">
                        <label for="cod1" class="control-label">Codigo asignacion</label>
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="cod1" value="PTL-" readonly required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="cod2" placeholder="Codigo" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="idserial" class="control-label">Serial</label>
                        <input type="text" class="form-control input-sm" id="idserial" name="idserial" placeholder="Numero serial" required>
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="iddescripcion" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="estado" class="control-label">Estado del equipo</label>
                        <select name="estado" class="form-control">
                            <option> -- Seleccione un estado -- </option>
                            <option value="Bueno">Bueno</option>
                            <option value="Defectuoso">Defectuoso</option>
                            <option value="Dañado">Dañado</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="idfecha" class="control-label">Fecha</label>
                        <input type="date" class="form-control input-sm" id="idfecha" name="idfecha" placeholder="Segundo nombre">
                    </div>
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