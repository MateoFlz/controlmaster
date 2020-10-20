<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'docentes'?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Nuevo docente</h5>
        </div>
        <div class="card-body">
        <?php

        if (strpos($fullUrl, "response=true") ==  true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Docente guardado satifactoriamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php   
        }

        if (strpos($fullUrl, "response=false") ==  true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrio un error al guardar el docente, la cedula ya exite!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
            <form class="needs-validation" novalidate role="form" id="" action="<?php echo URL;?>docentes/insert_docente" method="post">
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedula" placeholder="Numero de cédula" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1" placeholder="Primer nombre" required>
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
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2" placeholder="Segundo apellido" >
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefono" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-5">
                        <label for="idcorreo" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idcorreo" name="idcorreo" placeholder="Correo electronico" required>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="iddireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="iddireccion" name="iddireccion" placeholder="Dirección de residencia" required>
                    </div>
                    <div class="col-md-4">
                    <label for="condiciones" class="control-label">Tipo</label>
                        <select class='form-control input-sm' id="condiciones" name="condiciones" required>
                            <option value="">   -- Seleccione un tipo de docente --   </option>
                            <option value="Tiempo completo">Tiempo completo</option>
                            <option value="Medio tiempo">Medio tiempo</option>
                            <option value="Catedratico">Catedratico</option>
                            <option value="Otro">Otro</option>
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