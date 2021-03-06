<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Agregar nuevo equipo tecnologico
        </div>
        <div class="card-body">
            <?php
            if($_SESSION['crear'] == 1){
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
            <form action="<?php echo URL . "inventarios/insert"; ?>" method="post">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="idserial" class="control-label">Serial</label>
                        <input type="text" class="form-control input-sm" id="idserial" name="idserial"
                            placeholder="Numero serial" required>
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
                    <div class="col-md-6">
                        <label for="idmarca" class="control-label">Marca</label>
                        <input type="text" class="form-control" name="idmarca" id="idmarca">
                    </div>
                    <div class="col-md-6">
                        <label for="idmodelo" class="control-label">Modelo</label>
                        <input type="text" class="form-control" name="idmodelo" id="idmodelo">
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="iddescripcion" id="exampleFormControlTextarea1"
                            rows="2"></textarea>
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
            <?php
        }else{
                ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Usted no cuenta con privilegio para crear equipo!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            }
?>
        </div>
    </div>
    <br>
</div>