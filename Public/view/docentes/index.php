<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4 " style="max-width: 75rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <h5 class="text-dark">Listado docentes</h5>
        </div>
        <div class="card-body">
            <form class="" role="form" id="form_buscar_docente">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Cédula o nombre</strong></label>
                    <div class="col-md-7">
                        <input type="text" id="buscar_docente" class="form-control" placeholder="Cédula o nombre del docente">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                    <span id="loader2"></span>
                </div>
                
            </form>
            <div class="form-group row justify-content-center">
                <div type="button" class="btn-group ">
                    <a class="btn btn-success" href="<?php echo URL . 'docentes/create'?>"><i class="fa fa-user-plus"></i> Nuevo docente</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm " style="white-space: nowrap">
                    <thead>
                        <tr class="table-success">
                            <th class="thead-fix" scope="col">Cédula</th>
                            <th class="thead-fix" scope="col">Nombre</th>
                            <th class="thead-fix" scope="col">Telefono</th>
                            <th class="thead-fix" scope="col">Tipo</th>
                            <th class="thead-fix text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodydocente">
                        
                        <?php
                         
                        foreach($datos->fetchAll(\PDO::FETCH_ASSOC) as $row){
                        ?>
                        <tr <?php echo 'respon="'.$row['id'].'"'?>>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['tipo'] ?></td>
                            <td class="text-center">
                                <a href="docentes/show/<?php echo $row['id'] ?>"class="btn btn-primary border"><i class="fas fa-eye"></i></a>
                                <a href="docentes/editar/<?php echo $row['id'] ?>" class="btnedit btn btn-info border"><i class="fas fa-edit"></i></a>
                                <form action="docentes/delete/<?php echo $row['id'] ?>" method="post" style="display: inline">
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
<?php include_once 'Public/view/view/footer.php'?>