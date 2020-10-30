<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
print_r($datos)
?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'administradores' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Administrar permisos</h5>
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
            <div class="card">
                <div class="card-body">
                    This is some text within a card body.
                </div>

            </div>
            <br>
            <form action="<?php echo URL;
                            if (empty($datos['activos'])) {
                                echo 'administradores/insert_permisos/' . $datos['idw'];
                            } else {
                                echo 'administradores/update_permisos/' . $datos['idw'];
                            } ?>" method="POST" role="form" id="submitpermiso" onsubmit="myFunction()">
                <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Descripcion del permiso</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($datos['permiso'] as $row) {
                        ?>

                            <tr>
                                <th scope="row"><?php echo $row['id'] ?></th>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><input class="border border-secondary" type="checkbox" name="permisos[]" id="permi<?php echo $row['id'] ?>" value="<?php echo $row['id'] ?>" data-toggle="toggle" data-onstyle="success" <?php



                                                                                                                                                                                                                            foreach ($datos['activos'] as $rowt) {
                                                                                                                                                                                                                                if ($row['id'] == $rowt['idp']) {
                                                                                                                                                                                                                            ?> <?php if ($row['id'] == $rowt['idp']) {
                                                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                                                    } ?> <?php
                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                            }
                                                                                            ?>>
                                </td>
                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>
                <script>
                    var tamano = "<?php echo sizeof($datos['permiso']); ?>";
                    console.log(tamano);
                    function myFunction(){
                        alert('mensaje')
                        for (let x = 1; x < tamano; x++) {

                        if(!document.getElementById('#permi'+x).checked){
                            document.getElementById('#permi'+x).value = '0'
                        }

                        }
                    }
                </script>
                <div class="dropdown-divider"></div>
                <div class="form-group row justify-content-end">
                    <button type="reset" class="btn btn-danger" ><i class="fas fa-times"></i> Cancelar</button>&nbsp;
                    <button class="btn btn-success" id="btnsaves"><i class="fas fa-save"></i> Guardar</button>
                    <button type="submit" value="Submit" name="submit" id="submit" style="visibility:hidden">Enviar</button> 
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