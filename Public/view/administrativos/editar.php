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
            <h5 class="text-dark">Editar administrativo</h5>
        </div>
        <div class="card-body">
        <?php
        if($_SESSION['editar'] == 1){
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
                <input type="hidden" name="id" id="id" value="<?php echo $datos['administrativo']['id'] ?>">
                <div class="form-group row">
                   
                    <div class="col-md-4">
                    <label for="idcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedulaedit" value="<?php echo $datos['administrativo']['cedula'] ?>" placeholder="Numero de cédula" required readonly>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1edit" onkeydown="return false" value="<?php echo $datos['administrativo']['pnombre'] ?>" placeholder="Primer nombre" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre2" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre2" name="idnombre2edit" value="<?php echo $datos['administrativo']['snombre'] ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idapellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1" name="idapellido1edit" value="<?php echo $datos['administrativo']['papellido'] ?>" placeholder="Primer apellido" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idapellido2" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2edit" value="<?php echo $datos['administrativo']['sapellido'] ?>" placeholder="Segundo apellido" >
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefonoedit" value="<?php echo $datos['administrativo']['telefono'] ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-6">
                    <label for="idcorreo" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idcorreo" name="idcorreoedit" value="<?php echo $datos['administrativo']['correo'] ?>" placeholder="Correo electronico" required>
                    </div>
                    
                    <div class="col-md-6">
                    <label for="iddireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="iddireccion" name="iddireccionedit" value="<?php echo $datos['administrativo']['direccion'] ?>" placeholder="Dirección de residencia" required>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-6">
                    <label for="condiciones" class="control-label">Faculta</label>
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
                    <div class="col-md-6">
                        <label for="tel1" class="control-label">Estado</label>
                        <select class='form-control input-sm' id="condiciones2" name="condiciones2" required>
                            <option value="">-- Selecciona un estado --</option>
                            <option value="1" <?php if ($row['estado'] == 1) {
                                                    echo 'selected';
                                                } ?>>Activo</option>
                            <option value="0" <?php if ($row['estado'] == 0) {
                                                    echo 'selected';
                                              } ?>>Inactivo</option>
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
            <?php
            }else{
                ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Usted no cuenta con privilegio para editar administrativo!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            }
?>
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