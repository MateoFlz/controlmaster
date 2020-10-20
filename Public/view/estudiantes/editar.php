<?php
$data = new \Database\Models\Programa();

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullUrl, "response=true") ==  true){
    echo '<script>alert("Datos guardado satifactoriamente!")</script>';
}
if(strpos($fullUrl, "response=false") ==  true){
    echo '<script>alert("Ocurrio un error inesperado!")</script>';
}
if(strpos($fullUrl, "responsedit=true") ==  true){
    echo '<script>alert("Datos guardado satifactoriamente!")</script>';
}
if(strpos($fullUrl, "responsedit=false") ==  true){
    echo '<script>alert("Ocurrio un error inesperado!")</script>';
}
$row = $datos->fetch(PDO::FETCH_ASSOC);
?>
<?php include_once 'Public/view/view/header.php'?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'estudiantes'?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Editar estudiantes</h5>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="<?php echo URL; ?>estudiantes/edit_student" method="post">
                <div class="form-group row">
                    <label for="idcedulaedit" class="col-md-1 control-label">Cédula</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control input-sm" id="idcedulaedit" name="idcedulaedit" value="<?php  echo $row['cedula']; ?>" pattern="{11}" title="once(11) o menos, solo numero" placeholder="Numero de cédula" required>
                    </div>
                    <label for="idnombre1edit" class="col-md-1 control-label">Primer nombre</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="idnombre1edit" name="idnombre1edit" onkeydown="return false" value="<?php  echo $row['pnombre']; ?>" pattern="[a-zA-Z]{,40}" placeholder="Primer nombre" required>
                    </div>
                    <label for="idnombre2edit" class="col-md-1 control-label">Segundo nombre</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="idnombre2edit" name="idnombre2edit" value="<?php  echo $row['snombre']; ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idapellido1edit" class="col-md-1 control-label">Primer apellido</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="idapellido1edit" name="idapellido1edit" value="<?php  echo $row['papellido']; ?>" placeholder="Primer apellido" required>
                    </div>
                    <label for="idapellido2edit" class="col-md-1 control-label">Segundo apellido</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control input-sm" id="idapellido2edit" name="idapellido2edit" value="<?php  echo $row['sapellido']; ?>" placeholder="Segundo apellido">
                    </div>
                    <label for="idtelefono2edit" class="col-md-1 control-label">Telefono</label>
                    <div class="col-md-3">
                        <input type="number" class="form-control input-sm" id="idtelefono2edit" name="idtelefonoedit" value="<?php  echo $row['telefono']; ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idCorreoedit" class="col-md-1 control-label">Correo</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control input-sm" id="idCorreoedit" name="idCorreoedit" value="<?php  echo $row['correo']; ?>" placeholder="Correo electronico" required>
                    </div>
                    <label for="idDireccionedit" class="col-md-1 control-label">Dirección</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="idDireccion" name="idDireccionedit" value="<?php  echo $row['direccion']; ?>" placeholder="Dirección de residencia" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="condiciones1edit" class="col-md-1 control-label">Semestre</label>
                    <div class="col-md-4">
                        <select class='form-control input-sm' id="condiciones1edit" name="condiciones1edit" value="<?php  echo $row['semestre']; ?>" required>
                            <option value="">-- Selecciona semestre --</option>
                            <option value="1" <?php if($row['semestre'] == 1){echo 'selected';} ?>>I semestre</option>
                            <option value="2" <?php if($row['semestre'] == 2){echo 'selected';} ?>>II semestre</option>
                            <option value="3" <?php if($row['semestre'] == 3){echo 'selected';} ?>>III semestre</option>
                            <option value="4" <?php if($row['semestre'] == 4){echo 'selected';} ?>>VI semestre</option>
                            <option value="5" <?php if($row['semestre'] == 5){echo 'selected';} ?>>V semestre</option>
                            <option value="6" <?php if($row['semestre'] == 6){echo 'selected';} ?>>VI semestre</option>
                            <option value="7" <?php if($row['semestre'] == 7){echo 'selected';} ?>>VII semestre</option>
                            <option value="8" <?php if($row['semestre'] == 8){echo 'selected';} ?>>VIII semestre</option>
                            <option value="9" <?php if($row['semestre'] == 9){echo 'selected';} ?>>IX semestre</option>
                            <option value="10" <?php if($row['semestre'] == 10){echo 'selected';} ?>>X semestre</option>
                        </select>
                    </div>
                    <label for="tel1" class="col-md-1 control-label">Estado</label>
                    <div class="col-md-5">
                        <select class='form-control input-sm' id="condiciones2edit" name="condiciones2edit" required>
                            <option value="">-- Selecciona un estado --</option>
                            <option value="1" <?php if($row['Estado'] == 1){echo 'selected';} ?>>Activo</option>
                            <option value="0" <?php if($row['Estado'] == 0){echo 'selected';} ?>>Inactivo</option>
                        </select>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="condiciones3edit" class="col-md-2 control-label">Programa universitario</label>
                    <div class="col-md-9">
                        <select class='form-control input-sm' id="condicione3sedit" name="condiciones3edit" required>
                            <option value="">  -- Selecciona un programa academico --  </option>
                            <?php

                            foreach ($data->getAll()->fetchAll(\PDO::FETCH_ASSOC) AS $rows){
                                    if($row['nombreprograma'] == $rows['nombreprograma']){

                                        ?>

                                        <option value="<?php echo $rows['idProgramas'];?>" selected><?php echo $rows['nombreprograma']; ?></option>';

                                        <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo $rows['idProgramas'];?>"><?php echo $rows['nombreprograma']; ?></option>';


                                <?php
                                    }
                            }
                            ?>

                        </select>
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
<?php
if(strpos($fullUrl, "view=true") ==  true){
    echo '
        <script>
            $( "#idcedulaedit" ).prop( "disabled", true );
            $( "#idnombre1edit" ).prop( "disabled", true );
            $( "#idnombre2edit" ).prop( "disabled", true );
            $( "#idapellido1edit" ).prop( "disabled", true );
            $( "#idapellido2edit" ).prop( "disabled", true );
            $( "#idtelefono2edit" ).prop( "disabled", true );
            $( "#idCorreoedit" ).prop( "disabled", true );
            $( "#idDireccion" ).prop( "disabled", true );
            $( "#condiciones1edit" ).prop( "disabled", true );
            $( "#condiciones2edit" ).prop( "disabled", true );
            $( "#condicione3sedit" ).prop( "disabled", true );
        </script>';
}
if(strpos($fullUrl, "view=true") !=  true){
    echo '
        <script>
            $( "#idcedulaedit" ).prop( "disabled", true );
            $( "#idnombre1edit" ).prop( "disabled", true );
            $( "#idnombre2edit" ).prop( "disabled", true );
            $( "#idapellido1edit" ).prop( "disabled", true );
            $( "#idapellido2edit" ).prop( "disabled", true );
            $( "#idtelefono2edit" ).prop( "disabled", true );
            $( "#idCorreoedit" ).prop( "disabled", true );
            $( "#idDireccion" ).prop( "disabled", true );
            $( "#condiciones1edit" ).prop( "disabled", true );
            $( "#condiciones2edit" ).prop( "disabled", true );
            $( "#condicione3sedit" ).prop( "disabled", true );
        </script>';
}
if(strpos($fullUrl, "edit=true") ==  true){
    echo '
        <script>
            $( "#idcedulaedit" ).prop( "disabled", false );
            $( "#idnombre1edit" ).prop( "disabled", false );
            $( "#idnombre2edit" ).prop( "disabled", false );
            $( "#idapellido1edit" ).prop( "disabled", false );
            $( "#idapellido2edit" ).prop( "disabled", false );
            $( "#idtelefono2edit" ).prop( "disabled", false );
            $( "#idCorreoedit" ).prop( "disabled", false );
            $( "#idDireccion" ).prop( "disabled", false );
            $( "#condiciones1edit" ).prop( "disabled", false );
            $( "#condiciones2edit" ).prop( "disabled", false );
            $( "#condicione3sedit" ).prop( "disabled", false );
        </script>';
}
?>