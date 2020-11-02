<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">

        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-info" href="<?php echo URL . 'inventarios/index' ?>"><i
                        class="fa fa-arrow-alt-circle-left"></i> Regresar</a>
            </div>
            <h5 class="text-dark">Lista registro de utilidades</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                if (strpos($fullUrl, "editar") !=  true) {
                    include_once 'siret/crearutl.php';
                } else {
                    include_once 'siret/editarutl.php';
                }
                ?>
                <div class="col-md-8">
                    <div class="card">
                        <?php

                        if (strpos($fullUrl, "delete=true") ==  true) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Utilidad eliminada satifactoriamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        }

                        if (strpos($fullUrl, "delete=false") ==  true) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Ocurrio un error al eliminar el utilidad.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php
                        }
                        ?>
                        <div class="card-header">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Buscar por codigo o descripcion"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                            <th class="thead-fix" scope="col">ID</th>
                                            <th class="thead-fix" scope="col">Etiqueta</th>
                                            <th class="thead-fix" scope="col">Marca</th>
                                            <th class="thead-fix" scope="col">Cantidad</th>
                                            <th class="thead-fix" scope="col">Ubicacion</th>
                                            <th class="thead-fix" scope="col">Estado</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-utilidad">
                                        <?php

if (strpos($fullUrl, "editar") !=  true) {

    foreach ($datos['utilidades'] as $row) {
?>
                                        <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['descrip'] ?></td>
                                            <td><?php echo $row['marca'] ?></td>
                                            <td class="text-center"><?php echo $row['cantidad'] ?></td>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['estado'] ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                <a href="<?php echo URL . "inventarios/editarutl/" . $row['id']; ?>"
                                                    class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <form action="<?php echo URL . "inventarios/delete/" . $row['id']; ?>"
                                                    method="post" style="display: inline">
                                                    <button type="submit" class="btn btn-danger"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php

    }
} else {
    $rows = $datos['utilidades'];

    foreach ($rows as $row) {
    ?>
                                        <tr <?php echo 'respon="' . $row['id'] . '"' ?>>
                                        <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['descripcion'] ?></td>
                                            <td><?php echo $row['marca'] ?></td>
                                            <td class="text-center"><?php echo $row['cantidad'] ?></td>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['estado'] ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                <a href="<?php echo URL . "inventarios/editarutl/" . $row['id']; ?>"
                                                    class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <form action="<?php echo URL . "inventarios/delete/" . $row['id']; ?>"
                                                    method="post" style="display: inline">
                                                    <button type="submit" class="btn btn-danger"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
    }
}
?>
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