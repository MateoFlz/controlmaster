<?php

use Controller\Redirecter\Redirect;

include_once 'Public/view/view/header.php';
if($_SESSION['permisos'] == 0){
    echo '<script>
    window.location="'.URL .'dashboard";
    </script>';
}
?>

<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">

            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-light border" href="<?php echo URL . 'administrativos/crearPdf' ?>"><i
                        class="fas fa-file-pdf"></i> PDF</a>
            </div>
            <h5 class="text-dark">Listado administradores</h5>
        </div>
        <div class="card-body">
            <form class="" role="form" id="datos_administrador">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Cédula o nombre</strong></label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="buscar_administrador"
                            placeholder="Cédula o nombre del administrador">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                    <span id="loader3"></span>
                </div>
            </form>
            <div class="form-group row justify-content-center">
                <div type="button" class="btn-group ">
                    <a class="btn btn-success" href="<?php echo URL . 'administradores/create'?>"><i
                            class="fa fa-user-plus"></i> Nuevo administrador</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm " style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">Cédula</th>
                            <th class="thead-fix" scope="col">Nombre completo</th>
                            <th class="thead-fix text-center" scope="col">Tipo usuario</th>
                            <th class="thead-fix text-center" scope="col">Telefono</th>
                            <th class="thead-fix text-center" scope="col">Correo</th>
                            <th class="thead-fix text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyadmins">
                        <?php
                         
                        foreach($datos as $row){
                         ?>
                        <tr <?php echo 'respon="'.$row['id'].'"'?>>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['tipo'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td class="text-center">
                                <a href="administradores/admin/<?php echo $row['ids'] ?>"
                                    class="btn btn-light border"><i class="fas fa-user-cog"></i></a>
                                <a href="administradores/show/<?php echo $row['id'] ?>"
                                    class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                                <a href="administradores/editar/<?php echo $row['id'] ?>"
                                    class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                <form action="administradores/delete/<?php echo $row['id'] ?>" method="post"
                                    style="display: inline">
                                    <button type="submit" class="btn btn-danger"> <i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Public/view/view/footer.php'?>