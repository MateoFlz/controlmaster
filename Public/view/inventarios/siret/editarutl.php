<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Editar Equipo tecnologico
        </div>
        <div class="card-body">
            <?php
             if($_SESSION['editar'] == 1){    
            $rowt = $datos['utilidad']->fetchAll(\PDO::FETCH_ASSOC);
            if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Equipo actualizado satifactoriamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
            <?php
            }
            if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocurrio un error al actualizar el equipo.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
            
            }
            ?>
            <form action="<?php echo URL . "inventarios/updateutl"; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $rowt[0]['id']?>">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="estado" class="control-label">Tipo de equipo</label>
                        <select name="tipo" class="form-control" required>
                            <option value=""> -- : -- -- </option>
                            <?php 
                            foreach($datos['etiquetas'] as $row){
                                ?>
                            <option value="<?php echo $row['id']?>"<?php if($row['id'] ==  $rowt[0]['etiqueta_id']){ echo ' selected';}?>><?php echo $row['descripcion'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="idmarca" class="control-label">Marca</label>
                        <input type="text" class="form-control" name="idmarca" id="idmarca" value="<?php echo $rowt[0]['marca']?>">
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="iddescripcion" id="exampleFormControlTextarea1"
                            rows="2"><?php echo $rowt[0]['descripcion']?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="cantidad" class="control-label">Cantidad</label>
                    </div>    
                    <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" id="btndown" class="form-control btn-info"><i class="fas fa-level-down-alt"></i></button>
                        </div>
                        <input type="text" class="form-control text-center" value="<?php echo $rowt[0]['cantidad']?>" name="cantidad" id="cantidad" placeholder="" aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button type="button" id="btnup" class="form-control btn-success"><i class="fas fa-level-up-alt"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="sedesedit" class="control-label float-left">Sedes</label>
                        <select class='form-control' id="sedesedit" name="sedesedit" required>
                            <option value=""> -- : -- -- </option>
                            <option value="Sede A" <?php if('Sede A' == $rowt[0]['sede']){ echo 'selected';}?>>Sede A</option>
                            <option value="Sede B" <?php if('Sede B' == $rowt[0]['sede']){ echo 'selected';}?>>Sede B</option>
                            <option value="Sede C" <?php if('Sede C' == $rowt[0]['sede']){ echo 'selected';}?>>Sede C</option>
                            <option value="Sede E" <?php if('Sede E' == $rowt[0]['sede']){ echo 'selected';}?>>Sede E</option>
                            <option value="Casa blanca" <?php if('Casa blanca' == $rowt[0]['sede']){ echo 'selected';}?>>Casa blanca</option>
                            <option value="Consultorio Juridico" <?php if('Consultorio Juridico' == $rowt[0]['sede']){ echo 'selected';}?>>Consultorio Juridico
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="ubicacion" class="control-label">Aulas</label>
                        <select name="ubicacion" id="ubicacionedit" class="form-control" required>
                            <option value=""> -- : -- -- </option>
                        </select>
                    </div>
                    <script>
                        var ubicacion = "<?php echo $rowt[0]['ubicacion']?>";
                    </script>
                    <div class="col-md-6">
                        <label for="estado" class="control-label">Estado del equipo</label>
                        <select name="estado" class="form-control">
                            <option> -- : -- -- </option>
                            <option value="Bueno"  <?php if('Bueno' == $rowt[0]['estado']){echo 'selected';}?>>Bueno</option>
                            <option value="Defectuoso"  <?php if('Defectuoso' == $rowt[0]['estado']){echo 'selected';}?>>Defectuoso</option>
                            <option value="Dañado"  <?php if('Dañado' == $rowt[0]['estado']){echo 'selected';}?>>Dañado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="activo" class="control-label">Activo</label>
                        <select name="activo" class="form-control">
                            <option> -- : -- -- </option>
                            <option value="1"  <?php if('1' == $rowt[0]['activo']){echo 'selected';}?>>Activo</option>
                            <option value="0"  <?php if('0' == $rowt[0]['activo']){echo 'selected';}?>>Inactivo</option>
                            
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
                Usted no cuenta con privilegio para editar utlidad!
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