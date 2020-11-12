<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'administradores'?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Informacion administrativo</h5>
        </div>
        <div class="card-body">
        <?php

        if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                administrador actualizado satifactoriamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php   
        }

        if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrio un error al actualizar el administrador, la cedula ya exite!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
            <form class="needs-validation" novalidate role="form" id="" action="<?php echo URL;?>administradores/edit_administrador" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $datos['id'] ?>">
                <div class="form-group row">
                   
                    <div class="col-md-4">
                    <label for="idcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedulaedit" onkeydown="return false" value="<?php echo $datos['cedula'] ?>" placeholder="Numero de cédula" required readonly>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1edit" onkeydown="return false" value="<?php echo $datos['pnombre'] ?>" placeholder="Primer nombre" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre2" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre2" name="idnombre2edit" onkeydown="return false" value="<?php echo $datos['snombre'] ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idapellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1" name="idapellido1edit" onkeydown="return false" value="<?php echo $datos['papellido'] ?>" placeholder="Primer apellido" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idapellido2" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2edit" onkeydown="return false" value="<?php echo $datos['sapellido'] ?>" placeholder="Segundo apellido" >
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefonoedit" onkeydown="return false" value="<?php echo $datos['telefono'] ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idcorreo" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idcorreo" name="idcorreoedit" onkeydown="return false" value="<?php echo $datos['correo'] ?>" placeholder="Correo electronico" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="iddireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="iddireccion" name="iddireccionedit" onkeydown="return false" value="<?php echo $datos['direccion'] ?>" placeholder="Dirección de residencia" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tel1" class="control-label">Estado</label>
                        <select class='form-control input-sm' id="condiciones2" name="condiciones2" required disabled>
                            <option value="">-- Selecciona un estado --</option>
                            <option value="1" <?php if ($datos['estado'] == 1) {
                                                    echo 'selected';
                                                } ?>>Activo</option>
                            <option value="0" <?php if ($datos['estado'] == 0) {
                                                    echo 'selected';
                                              } ?>>Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-md-4">
                    <label for="idcondiciones3" class="control-label">Tipo</label>
                    <select class='form-control input-sm' name="idcondiciones3" id="idcondiciones3" required disabled>
                        <option value="">-- Selecciona un tipo de usuario --
                        </option>
                        <option value="Administrador" <?php if ($datos['tipo'] == 'Administrador') {
                                                    echo 'selected';
                                                } ?>>Administrador</option>
                        <option value="Tecnico" <?php if ($datos['tipo'] == 'Tecnico') {
                                                    echo 'selected';
                                                } ?>>Tecnico</option>
                    </select>
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