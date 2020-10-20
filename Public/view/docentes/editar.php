<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$row = $datos->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'docentes'?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Editar docente</h5>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate role="form" id="" action="" method="post">
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idcedula" class="control-label">Cédula</label>
                        <input type="number" class="form-control input-sm" id="idcedula" name="idcedula" value="<?php echo $row['cedula']?>" placeholder="Numero de cédula" required readonly>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre1" class="control-label">Primer nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre1" name="idnombre1" value="<?php echo $row['pnombre']?>" placeholder="Primer nombre" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idnombre2" class="control-label">Segundo nombre</label>
                        <input type="text" class="form-control input-sm" id="idnombre2" name="idnombre2" value="<?php echo $row['snombre']?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-4">
                    <label for="idapellido1" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1" name="idapellido1" value="<?php echo $row['papellido']?>" placeholder="Primer apellido" required>
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idapellido2" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2" name="idapellido2" value="<?php echo $row['sapellido']?>" placeholder="Segundo apellido" >
                    </div>
                    
                    <div class="col-md-4">
                    <label for="idtelefono" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono" name="idtelefono" value="<?php echo $row['telefono']?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="col-md-5">
                        <label for="idcorreo" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idcorreo" name="idcorreo" placeholder="Correo electronico" value="<?php echo $row['correo']?>" required>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="iddireccion" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="iddireccion" name="iddireccion" placeholder="Dirección de residencia" value="<?php echo $row['direccion']?>" required>
                    </div>
                    <div class="col-md-4">
                    <label for="condiciones" class="control-label">Tipo</label>
                        <select class='form-control input-sm' id="condiciones" name="condiciones" required>
                            <option value="">   -- Seleccione un tipo de docente --   </option>

                            <option value="Tiempo completo" <?php if($row['tipo'] == 'Tiempo completo'){echo 'selected';} ?>>Tiempo completo</option>
                            <option value="Medio tiempo" <?php if($row['tipo'] == 'Medio tiempo'){echo 'selected';} ?>>Medio tiempo</option>
                            <option value="Catedratico" <?php if($row['tipo'] == 'Catedratico'){echo 'selected';} ?>>Catedratico</option>
                            <option value="Otro" <?php if($row['tipo'] == 'Otro'){echo 'selected';} ?>>Otro</option>
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