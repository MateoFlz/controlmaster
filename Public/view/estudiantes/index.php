<?php include_once 'Public/view/view/header.php';
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['crear'];
?>
<div class="container-fluid pt-4" style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        
        <div class="card-header bg-light">
        <div type="button" class="btn-group float-md-right">
                <a class="btn btn-light border" href="<?php echo URL . 'estudiantes/ReporteEstudiantes' ?>" target="blank"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
            <h5 class="text-dark">Listado estudiantes</h5>
        </div>
        <div class="card-body">

        <?php

if (strpos($fullUrl, "acceso=false") ==  true) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Ocurrio un error al guardar el estudiantes, la cedula ya exite!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}
?>
            <form class="" role="form" id="datos_estudiante">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Cédula o nombre</strong></label>
                    <div class="col-md-7">
                        <input type="text" id="searchusuario" class="form-control" placeholder="Cédula o nombre del estudiante">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                    <span id="loader1"></span>
                </div>
            </form>
            <div class="form-group row justify-content-center">
                <div type="button" class="btn-group ">
                    <a class="btn btn-success" href="<?php echo URL . 'estudiantes/create' ?>"><i class="fas fa-user-plus"></i> Nuevo estudiante</a>
                </div>
            </div>
            <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">Cédula</th>
                            <th class="thead-fix" scope="col">Nombre</th>
                            <th class="thead-fix" scope="col">Programa</th>
                            <th class="thead-fix" scope="col">Semestre</th>
                            <th class="thead-fix" scope="col">Telefono</th>
                            <th class="thead-fix text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-student">
                    <?php
                         
                         foreach($datos as $row){
                          ?>
                          <tr <?php echo 'respon="'.$row['id'].'"'?>>
                              <td><?php echo $row['cedula'] ?></td>
                              <td><?php echo $row['nombre'] ?></td>
                              <td><?php echo $row['nombreprograma'] ?></td>
                              <td><?php echo $row['semestre'] ?></td>
                              <td><?php echo $row['telefono'] ?></td>
                              
                              <td class="text-center">
                                    <a href="estudiantes/show/<?php echo $row['id'] ?>" class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                                    <a href="estudiantes/editar/<?php echo $row['id'] ?>" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                    <form action="estudiantes/delete/<?php echo $row['id'] ?>" method="post" style="display: inline">
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
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
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>