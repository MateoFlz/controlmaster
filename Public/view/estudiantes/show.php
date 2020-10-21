<?php
$data = new \Database\Models\Programa();

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$row = $datos->fetch(PDO::FETCH_ASSOC);
?>
<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'estudiantes' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Mostrar datos estudiantes</h5>
        </div>
        <div class="card-body">
            <form class="needs-validation" novalidate action="<?php echo URL; ?>estudiantes/edit_student" method="post">
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
                        <input type="text" class="form-control input-sm" id="idnombre2edit" name="idnombre2edit" onkeydown="return false" value="<?php echo $row['snombre']; ?>" placeholder="Segundo nombre">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-4">
                        <label for="idapellido1edit" class="control-label">Primer apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido1edit" name="idapellido1edit" onkeydown="return false" value="<?php echo $row['papellido']; ?>" placeholder="Primer apellido" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idapellido2edit" class="control-label">Segundo apellido</label>
                        <input type="text" class="form-control input-sm" id="idapellido2edit" name="idapellido2edit" onkeydown="return false" value="<?php echo $row['sapellido']; ?>" placeholder="Segundo apellido">
                    </div>

                    <div class="col-md-4">
                        <label for="idtelefono2edit" class="control-label">Telefono</label>
                        <input type="number" class="form-control input-sm" id="idtelefono2edit" name="idtelefonoedit" onkeydown="return false" value="<?php echo $row['telefono']; ?>" placeholder="Numero telefonico" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-6">
                        <label for="idCorreoedit" class="control-label">Correo</label>
                        <input type="email" class="form-control input-sm" id="idCorreoedit" name="idCorreoedit" onkeydown="return false" value="<?php echo $row['correo']; ?>" placeholder="Correo electronico" required>
                    </div>

                    <div class="col-md-6">
                        <label for="idDireccionedit" class="control-label">Dirección</label>
                        <input type="text" class="form-control input-sm" id="idDireccion" name="idDireccionedit" onkeydown="return false" value="<?php echo $row['direccion']; ?>" placeholder="Dirección de residencia" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-md-5">
                        <label for="condiciones1edit" class="control-label">Semestre</label>
                        <select class='form-control input-sm' id="condiciones1edit" name="condiciones1edit" value="<?php echo $row['semestre']; ?>" required disabled>
                            <option value="">-- Selecciona semestre --</option>
                            <option value="1" <?php if ($row['semestre'] == 1) {
                                                    echo 'selected';
                                                } ?>>I semestre</option>
                            <option value="2" <?php if ($row['semestre'] == 2) {
                                                    echo 'selected';
                                                } ?>>II semestre</option>
                            <option value="3" <?php if ($row['semestre'] == 3) {
                                                    echo 'selected';
                                                } ?>>III semestre</option>
                            <option value="4" <?php if ($row['semestre'] == 4) {
                                                    echo 'selected';
                                                } ?>>VI semestre</option>
                            <option value="5" <?php if ($row['semestre'] == 5) {
                                                    echo 'selected';
                                                } ?>>V semestre</option>
                            <option value="6" <?php if ($row['semestre'] == 6) {
                                                    echo 'selected';
                                                } ?>>VI semestre</option>
                            <option value="7" <?php if ($row['semestre'] == 7) {
                                                    echo 'selected';
                                                } ?>>VII semestre</option>
                            <option value="8" <?php if ($row['semestre'] == 8) {
                                                    echo 'selected';
                                                } ?>>VIII semestre</option>
                            <option value="9" <?php if ($row['semestre'] == 9) {
                                                    echo 'selected';
                                                } ?>>IX semestre</option>
                            <option value="10" <?php if ($row['semestre'] == 10) {
                                                    echo 'selected';
                                                } ?>>X semestre</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="condiciones3edit" class=" control-label">Programa universitario</label>
                        <select class='form-control input-sm' id="condicione3sedit" name="condiciones3edit" required disabled>
                            <option value=""> -- Selecciona un programa academico -- </option>
                            <?php

                            foreach ($data->getAll()->fetchAll(\PDO::FETCH_ASSOC) as $rows) {
                                if ($row['nombreprograma'] == $rows['nombreprograma']) {

                            ?>

                                    <option value="<?php echo $rows['id']; ?>" selected><?php echo $rows['nombreprograma']; ?></option>';

                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['nombreprograma']; ?></option>';


                            <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">

                    
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