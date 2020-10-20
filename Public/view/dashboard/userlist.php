<?php include_once 'Public/view/view/header.php'?>
<div class="container-fluid pt-4" style="max-width: 70rem;">
    <div class="card border-secondary mb-3" >
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-success" href="<?php echo URL . 'estudiantes/create'?>"><i class="fas fa-user-plus"></i> Nuevo estudiante</a>
            </div>
            <h5 class="text-dark">Listado de usuarios</h5>
        </div>
        <div class="card-body">
            <form class="" role="form" id="datos_estudiante">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><strong>Cédula o nombre</strong></label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Cédula o nombre del estudiante">
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-light border">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive" style="max-height: 340px">
                <table class="table table-hover table-sm" style="white-space: nowrap">
                    <thead>
                    <tr class="table-success">
                        <th class="thead-fix" scope="col">Cédula</th>
                        <th class="thead-fix" scope="col">Nombre</th>
                        <th class="thead-fix" scope="col">Telefono</th>
                        <th class="thead-fix" scope="col">Correo</th>
                        <th class="thead-fix text-center" scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Active</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Default</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Primary</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Secondary</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Success</th>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>mattteo19997@gmail.com</td>
                        <td class="text-center">
                            <button class="btn btn-primary border"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-info border"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger border"><i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include_once 'Public/view/view/footer.php'?>


