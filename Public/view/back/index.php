<?php include_once 'Public/view/view/header.php'; 
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<div class="container-fluid pt-4" style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-light border" href="<?php echo URL . 'estudiantes/crearPdf' ?>"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
            <h5 class="text-dark">Listado backups</h5>
        </div>
        <div class="card-body">
        <?php
        if (strpos($fullUrl, "response=true") ==  true) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                logg eliminado satifactoriamente
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php   
        }

        if (strpos($fullUrl, "response=false") ==  true) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrio un error al eliminar logg!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php
        }
        ?>
            <form class="" role="form" id="datos_estudiante">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>ID o Cédula</strong></label>
                    <div class="col-md-7">
                        <input type="text" id="searchusuario" class="form-control" placeholder="Id o nombre del administrador">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                    <span id="loader1"></span>
                </div>
            </form>
            <div class="form-group row justify-content-center">
                <div type="button" class="btn-group">
                    <a class="btn btn-success" id="idbackp" onclick="oncli();" href=""> <i class="fas fa-user-plus"></i> Nuevo backup</a>
                </div>

                <script>
                    function oncli() {
                        event.preventDefault();
                        window.location = "<?php URL ?>helpers/backups/descargar.php";
                    }
                </script>
                <form id="backuplogg" method="post" action="<?php echo URL . 'back/create_backup' ?>">
                </form>
            </div>

            <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">ID</th>
                            <th class="thead-fix" scope="col">Detalles</th>
                            <th class="thead-fix" scope="col">Fecha</th>
                            <th class="thead-fix" scope="col">Creador</th>
                            <th class="thead-fix" scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-back">
                        <?php
                        foreach ($datos as $row) {
                        ?>
                            <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                <td scope="row"><?php echo $row['id'] ?></td>
                                <td><?php echo $row['detalles'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td>
                                    <form action="back/delete/<?php echo $row['id'] ?>" method="post" style="display: inline">
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>