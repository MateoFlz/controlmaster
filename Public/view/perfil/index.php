<?php

include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4" style="max-width: 70rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <h5 class="text-dark">Actualizar informacion de perfil</h5>
        </div>
        <div class="card-body align-content-end flex-wrap justify-content-center">
            <form class="needs-validation" novalidate role="form" id="formperfil" action="<?php echo URL; ?>perfil/editar" method="post">
                <h5 class="text-left">Informacion personal</h5>
                <hr>
                <?php

                if (strpos($fullUrl, "responsedit=true") ==  true) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Datos actualizados satifactoriamente
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }

                if (strpos($fullUrl, "responsedit=false") ==  true) { ?>
                    <div id="programdanger" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Ocurrio un error al guardar el programa.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                }
                ?>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="iddcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="iddcedula" name="iddcedula" value="<?php echo $datos[0]['cedula'] ?>" placeholder="Numero de cédula" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="iddnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="iddnombre1" name="iddnombre1" value="<?php echo $datos[0]['pnombre'] ?>" placeholder="Primer nombre">
                    </div>

                    <div class="col-md-4">
                        <label for="iddnombre2" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="iddnombre2" name="iddnombre2" value="<?php echo $datos[0]['snombre'] ?>" placeholder="Segundo nombre">
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="iddapellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="iddapellido1" name="iddapellido1" value="<?php echo $datos[0]['papellido'] ?>" placeholder="Primer apellido">
                    </div>

                    <div class="col-md-4">
                        <label for="iddapellido2" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="iddapellido2" name="iddapellido2" value="<?php echo $datos[0]['sapellido'] ?>" placeholder="Primer apellido">
                    </div>

                    <div class="col-md-4">
                        <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="iddtelefono" name="idtelefono" value="<?php echo $datos[0]['telefono'] ?>" placeholder="Numero telefonico" onkeypress="if(this.value.length==10) return false;">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="iddcorreo" class="control-label">Correo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="email" class="form-control input-sm" id="iddcorreo" name="iddcorreo" value="<?php echo $datos[0]['correo'] ?>" placeholder="Correo electronico" required>
                        </div>
                    </div>
                    <div class="col">
                        <label for="iddireccion1" class="ontrol-label">Dirección recidencial</label>
                        <input type="text" class="form-control input-sm" id="iddireccion1" name="iddireccion1" value="<?php echo $datos[0]['direccion'] ?>" placeholder="Dirección de residencia">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Actualizar datos</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <h5 class="text-dark">Actualizar contraseña</h5>
        </div>
        <div class="card-body align-content-end flex-wrap justify-content-center">
            <h5 class="text-left">Datos de acceso</h5>
            <hr>
            <?php

                if (strpos($fullUrl, "responspass=true") ==  true) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Datos actualizados satifactoriamente
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }

                if (strpos($fullUrl, "responspass=false") ==  true) { ?>
                    <div id="programdanger" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Ocurrio un error al guardar el programa.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                }
                ?>
            <form role="form" id="formcontraseña" action="<?php echo URL; ?>perfil/edit_password" method="post">
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="actual_contraseña" class="control-label ">Contraseña actual</label>
                        <input type="password" class="form-control input-sm" id="actual_contraseña" name="actual_contraseña" placeholder="Contraseña actual" required>
                    </div>

                    <div class="col-md-5">
                        <label for="nueva_contraseña" class="control-label">Nueva contraseña</label>
                        <input type="password" class="form-control input-sm" id="nueva_contraseña" name="nueva_contraseña" placeholder="Nueva contraseña">
                    </div>

                    <div class="col-md-3">
                        <label for="iddnombre2" class="control-label">&nbsp;</label>
                        <button class="form-control btn btn-primary"><i class="fas fa-key"></i> Actualizar contraseña</button>
                    </div>
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
<?php include_once 'Public/view/view/footer.php' ?>