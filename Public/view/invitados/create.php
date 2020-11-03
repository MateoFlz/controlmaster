<?php
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'invitados' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Nuevo invitado</h5>
        </div>
        <div class="card-body">
            <?php

            if($_SESSION['crear'] == 1){
            if (strpos($fullUrl, "response=true") ==  true) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Estudiante guardado satifactoriamente
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }

            if (strpos($fullUrl, "response=false") ==  true) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ocurrio un error al guardar el estudiantes, la cedula ya exite!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php
            }
            ?>
            <form class="needs-validation" novalidate role="form" id="" action="<?php echo URL; ?>invitados/insert_invitado" method="post">
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="idcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedula" pattern="{11}" title="once(11) o menos, solo numero" placeholder="Numero de cédula" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1" pattern="[a-zA-Z]{,40}" placeholder="Primer nombre" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idnombre2" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre2" name="idnombre2" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="idapellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1" name="idapellido1" placeholder="Primer apellido" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idapellido2" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2" placeholder="Segundo apellido">
                    </div>

                    <div class="col-md-4">
                        <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefono" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="idCorreo" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idCorreo" name="idCorreo" placeholder="Correo electronico" required>
                    </div>

                    <div class="col-md-6">
                        <label for="idDireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="idDireccion" name="idDireccion" placeholder="Dirección de residencia" required>
                    </div>
                    <div class="col-md-12">
                        <label for="iddescripcion" class="control-label">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="2"></textarea>
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
                Usted no cuenta con privilegio para crear invitados!
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