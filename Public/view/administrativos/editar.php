<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$row = $datos['administrativo'];
$ros = $datos['dependencia'];
?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'administrativos'?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Nuevo administrativo</h5>
        </div>
        <div class="card-body">
        <?php

        if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                administrativos actualizado satifactoriamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php   
        }

        if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrio un error al actualizar el administrativo, la cedula ya exite!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
            <form class="needs-validation" novalidate role="form" id="" action="<?php echo URL;?>administrativos/edit_administrativo" method="post">
                <div class="form-group row">
                    <label for="idcedula" class="col-md-1 control-label">Cédula</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedulaedit" value="<?php echo $datos['administrativo']['cedula'] ?>" placeholder="Numero de cédula" required readonly>
                    </div>
                    <label for="idnombre1" class="col-md-1 control-label">Primer nombre</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1edit" value="<?php echo $datos['administrativo']['pnombre'] ?>" placeholder="Primer nombre" required>
                    </div>
                    <label for="idnombre2" class="col-md-1 control-label">Segundo nombre</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="idnombre2" name="idnombre2edit" value="<?php echo $datos['administrativo']['snombre'] ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idapellido1" class="col-md-1 control-label">Primer apellido</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="idapellido1" name="idapellido1edit" value="<?php echo $datos['administrativo']['papellido'] ?>" placeholder="Primer apellido" required>
                    </div>
                    <label for="idapellido2" class="col-md-1 control-label">Segundo apellido</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2edit" value="<?php echo $datos['administrativo']['sapellido'] ?>" placeholder="Segundo apellido" >
                    </div>
                    <label for="idtelefono" class="col-md-1 control-label">Telefono</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefonoedit" value="<?php echo $datos['administrativo']['telefono'] ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idcorreo" class="col-md-1 control-label">Correo</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control input-sm" id="idcorreo" name="idcorreoedit" value="<?php echo $datos['administrativo']['correo'] ?>" placeholder="Correo electronico" required>
                    </div>
                    <label for="iddireccion" class="col-md-1 control-label">Dirección</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="iddireccion" name="iddireccionedit" value="<?php echo $datos['administrativo']['direccion'] ?>" placeholder="Dirección de residencia" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="condiciones" class="col-md-1 control-label">Faculta</label>
                    <div class="col-md-6">
                        <select class='form-control input-sm' id="condiciones" name="condicionesedit" required>
                            <option value="">   -- Seleccione una dependencia --   </option>
                           <?php
                                foreach($datos['dependencia'] AS $rows){
                                    ?>
                                    <option value="<?php echo $rows['id'] ?>"<?php if($datos['administrativo']['dependencia'] == $rows['id']){ echo ' selected';} ?>><?php  echo $rows['nombre_dependencia'] ?></option>
                                <?php
                                }
                           ?>
                        </select>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-warning btn-lg"><i class="fas fa-fingerprint"></i><br>Huella</button>
                </div>
                <div class="dropdown-divider"></div>
                <div class="form-group row justify-content-end">

                    <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</button>&nbsp;
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </form>

        </div>
    </div>
    
</div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
<?php include_once 'Public/view/view/footer.php'?>