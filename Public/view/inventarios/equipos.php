<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/index' ?>"><i class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Lista registro de equipos tecnologicos</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <?php
                if (strpos($fullUrl, "editar") !=  true) {
                    include_once 'siret/crear.php';
                } else {
                    include_once 'siret/editar.php';
                }
                ?>
                <div class="col-md-8">
                    <div class="card">
                        <?php

                        if (strpos($fullUrl, "delete=true") ==  true) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Portatil eliminado satifactoriamente.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }

                        if (strpos($fullUrl, "delete=false") ==  true) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ocurrio un error al eliminar el portail.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>
                        <div class="card-header">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar por codigo o descripcion" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" style="max-height: 340px">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Codigo</th>
                                            <th class="thead-fix" scope="col">Descripcion</th>
                                            <th class="thead-fix" scope="col">Estado</th>
                                            <th class="thead-fix" scope="col">Fecha</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-audio">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>