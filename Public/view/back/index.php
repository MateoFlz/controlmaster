<?php include_once 'Public/view/view/header.php';?>
<div class="container-fluid pt-4" style="max-width: 75rem;">
    <div class="card border-secondary mb-3">
        
        <div class="card-header bg-light">
        <div type="button" class="btn-group float-md-right">
                <a class="btn btn-light border" href="<?php echo URL . 'estudiantes/crearPdf' ?>"><i class="fas fa-file-pdf"></i> PDF</a>
            </div>
            <h5 class="text-dark">Listado backups</h5>
        </div>
        <div class="card-body">
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
                <div type="button" class="btn-group ">
                    <a class="btn btn-success" href="<?php echo URL . 'back/backups' ?>"><i class="fas fa-user-plus"></i> Nuevo backup</a>
                </div>
            </div>
            <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">ID</th>
                            <th class="thead-fix" scope="col">Detalles</th>
                            <th class="thead-fix" scope="col">Fecha</th>
                            <th class="thead-fix" scope="col">Creador</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-back">
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php' ?>