<?php

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$row = $datos->fetch(PDO::FETCH_ASSOC);
?>
<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'invitados' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Editar estudiantes</h5>
        </div>
        <div class="card-body">
            <?php
            if($_SESSION['crear'] == 1){
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
            <form class="needs-validation" novalidate action="<?php echo URL; ?>invitados/edit" method="post">
                <div class="form-group row">
                    <input type="hidden" class="form-control input-sm" name="id" value="<?php echo $row['id']; ?>">
                    <div class="col-md-4">
                        <label for="idcedulaedit" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedulaedit" name="idcedulaedit" value="<?php echo $row['cedula']; ?>" pattern="{11}" title="once(11) o menos, solo numero" placeholder="Numero de cédula" required readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="idnombre1edit" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1edit" name="idnombre1edit" onkeydown="return false" value="<?php echo $row['pnombre']; ?>" pattern="[a-zA-Z]{,40}" placeholder="Primer nombre" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idnombre2edit" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre2edit" name="idnombre2edit" value="<?php echo $row['snombre']; ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="idapellido1edit" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1edit" name="idapellido1edit" value="<?php echo $row['papellido']; ?>" placeholder="Primer apellido" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idapellido2edit" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2edit" name="idapellido2edit" value="<?php echo $row['sapellido']; ?>" placeholder="Segundo apellido">
                    </div>

                    <div class="col-md-4">
                        <label for="idtelefono2edit" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono2edit" name="idtelefonoedit" value="<?php echo $row['telefono']; ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="idCorreoedit" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idCorreoedit" name="idCorreoedit" value="<?php echo $row['correo']; ?>" placeholder="Correo electronico" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idDireccionedit" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="idDireccionedit" name="idDireccionedit" value="<?php echo $row['direccion']; ?>" placeholder="Dirección de residencia" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tel1" class="control-label">Estado</label>
                        <select class='form-control input-sm' id="condiciones2edit" name="condiciones2edit" required>
                            <option value="">-- Selecciona un estado --</option>
                            <option value="1" <?php if ($row['estado'] == 1) {
                                                    echo 'selected';
                                                } ?>>Activo</option>
                            <option value="0" <?php if ($row['estado'] == 0) {
                                                    echo 'selected';
                                                } ?>>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                    <label for="condiciones3edit" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="descripcionedit" id="exampleFormControlTextarea1" rows="2"><?php echo $row['detalles']; ?></textarea>
                    </div>
                    
                </div>

                <div class="dropdown-divider"></div>
                <div class="form-group row justify-content-center">
                    <button type="button" class="btn btn-warning btn-lg"><i class="fas fa-fingerprint"></i><br>Huella</button>
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
                Usted no cuenta con privilegio para editar invitados!
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
<?php include_once 'Public/view/view/footer.php' ?>