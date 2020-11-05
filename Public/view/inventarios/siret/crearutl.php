<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Agregar nueva utilidad
        </div>
        <div class="card-body">
            <?php

            if (strpos($fullUrl, "response=true") ==  true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Equipos guardado satifactoriamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            }

            if (strpos($fullUrl, "response=false") ==  true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrio un error al guardar el equipos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
            }
            ?>
            <form action="<?php echo URL . "inventarios/insert_utilidad"; ?>" method="post">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="idmarca" class="control-label">Marca</label>
                        <input type="text" class="form-control" name="idmarca" id="idmarca">
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="control-label">Tipo de equipo</label>
                        <select name="tipo" class="form-control" required>
                            <option value=""> -- : -- -- </option>
                            <?php 
                            foreach($datos['etiquetas'] as $row){
                                ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['descripcion'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="iddescripcion" id="exampleFormControlTextarea1"
                            rows="2"></textarea>
                    </div>
                    <div class="col-md-12">
                    <label for="cantidad" class="control-label">Cantidad</label>
                    </div>
                   
                    <div class="col-md-12 input-group mb-3">
                       
                        <div class="input-group-prepend">
                            <button type="button" id="btndown" class="form-control btn-info"><i class="fas fa-level-down-alt"></i></button>
                        </div>
                        <input type="text" class="form-control text-center" name="cantidad" id="cantidad" placeholder="" aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button type="button" id="btnup" class="form-control btn-success"><i class="fas fa-level-up-alt"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="selectsedes" class="control-label float-left">Sedes</label>
                        <select class='form-control' id="selectsedes" name="sedes" required>
                            <option value=""> -- : -- -- </option>
                            <option value="Sede A">Sede A</option>
                            <option value="Sede B">Sede B</option>
                            <option value="Sede C">Sede C</option>
                            <option value="Sede E">Sede E</option>
                            <option value="Casa blanca">Casa blanca</option>
                            <option value="Consultorio Juridico">Consultorio Juridico
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="ubicacion" class="control-label">Aulas</label>
                        <select name="ubicacion" id="ubicacion" class="form-control" required>
                            <option value=""> -- : -- -- </option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="estado" class="control-label">Estado del equipo</label>
                        <select name="estado" class="form-control">
                            <option> -- : -- -- </option>
                            <option value="Bueno">Bueno</option>
                            <option value="Defectuoso">Defectuoso</option>
                            <option value="Dañado">Dañado</option>
                        </select>
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