<?php include_once 'Public/view/view/header.php'?>
<div class="container-fluid pt-4 " style="max-width: 85rem;">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <h5 class="text-dark">Administracion de componente</h5>
        </div>
        <div class="card-body d-flex align-content-end flex-wrap justify-content-center">
            <div class="card" style="min-width: 100%; min-height: 25rem">
                <div class="card-header bg-light">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" data-toggle="tab">Administradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profile" data-toggle="tab">Programas</a>
                        </li>
                        <li class="nav-item" id="depencia">
                            <a class="nav-link" href="#contact" data-toggle="tab">Dependencias</a>
                        </li>
                        <li class="nav-item" id="usuarios">
                            <a class="nav-link" href="#users" data-toggle="tab">Gestion Usuarios</a>
                        </li>
                        <li class="nav-item" id="eti">
                            <a class="nav-link" href="#etiquetas" data-toggle="tab">Etiquetas</a>
                        </li>
                        <li class="nav-item" id="aula">
                            <a class="nav-link" href="#aulas" data-toggle="tab">Aulas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-center" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <form>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><strong>Buscar usuario</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" placeholder="Cedula o nombre usuario">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-light border">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn btn-success " data-toggle="modal"
                                    data-target=".bd-example-modal-xl">
                                    <i class="fa fa-plus"></i> Agregar usuario
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-xl" id="" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar administrador de
                                                sistema</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-center">Informacion personal</h5>
                                            <hr>
                                            <form role="form" id="formadmin">
                                                <div class="form-group row">
                                                    <label for="iddcedula" class="col-md-1 control-label">Cédula</label>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control input-sm"
                                                            id="iddcedula" placeholder="Numero de cédula" required>
                                                    </div>
                                                    <label for="iddnombre1" class="col-md-1 control-label">Primer
                                                        nombre</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" id="iddnombre1"
                                                            placeholder="Primer nombre">
                                                    </div>
                                                    <label for="iddnombre2" class="col-md-1 control-label">Segundo
                                                        nombre</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm" id="iddnombre2"
                                                            placeholder="Segundo nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="iddapellido1" class="col-md-1 control-label">Primer
                                                        apellido</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm"
                                                            id="iddapellido1" placeholder="Primer apellido">
                                                    </div>
                                                    <label for="iddapellido2" class="col-md-1 control-label">Segundo
                                                        apellido</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm"
                                                            id="iddapellido2" placeholder="Primer apellido">
                                                    </div>
                                                    <label for="iddtelefono"
                                                        class="col-md-1 control-label">Telefono</label>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control input-sm"
                                                            id="iddtelefono" placeholder="Numero telefonico">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="iddcorreo" class="col-md-1 control-label">Correo</label>
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control input-sm" id="iddcorreo"
                                                            placeholder="Correo electronico" required>
                                                    </div>
                                                    <label for="iddireccion1" class="col-md-2 control-label">Dirección
                                                        recidencial</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm"
                                                            id="iddireccion1" placeholder="Dirección de residencia">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="idcondiciones1"
                                                        class="col-md-1 control-label">Estado</label>
                                                    <div class="col-md-5">
                                                        <select class='form-control input-sm' id="idcondiciones1"
                                                            required>
                                                            <option value="">-- Selecciona un estado --</option>
                                                            <option value="1">Activo</option>
                                                            <option value="0">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h5 class="text-center">Datos de acceso</h5>
                                                <hr>
                                                <div class="form-group row">
                                                    <label for="idcondiciones2"
                                                        class="col-md-1 control-label">Usuario</label>
                                                    <div class="col-md-4">
                                                        <select class='form-control input-sm' id="idcondiciones2"
                                                            required>
                                                            <option value="">-- Selecciona un tipo de usuario --
                                                            </option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Tecnico">Tecnico</option>
                                                        </select>
                                                    </div>
                                                    <label for="idpasswords" class="col-md-2 control-label">Contraseña
                                                        de acceso</label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control input-sm"
                                                            id="idpasswords" placeholder="Digite su contraseña" required
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
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
                                    <tbody id="tbodyusuario">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade text-center" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <form class="" role="form" id="searchprogram">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-2 col-form-label"><strong>Programa</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" id="programsearch" class="form-control"
                                            placeholder="Id o programa">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-light border" id="search">Buscar</button>
                                    </div>
                                    <span id="loader"></span>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn-open btn btn-success" data-toggle="modal"
                                    data-target="#staticBackdrop2">
                                    <i class="fa fa-plus"></i> Agregar programa
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop2" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar programa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <div id="programsuccess"
                                                class="alert alert-success alert-dismissible fade show" role="alert">
                                                Programa guardado satifactoriamente
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="programdanger"
                                                class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Ocurrio un error al guardar el programa.
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formprogram" class="pt-0">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="nameprogram"
                                                            placeholder="Nombre del programa" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="successProgram">Guardar</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Id programa</th>
                                            <th class="thead-fix" scope="col">Nombre del programa</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyprogram">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="" role="form" id="searchdependencia">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-2 col-form-label"><strong>Dependencia</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" id="dependenciasearch" class="form-control"
                                            placeholder="Id o dependencia">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-light border">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn-open-depe btn btn-success" data-toggle="modal"
                                    data-target="#staticBackdrop3">
                                    <i class="fa fa-plus"></i> Agregar dependencia
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop3" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar Dependencia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formdependencia">
                                            <div class="modal-body">
                                                <div id="dependencesuccess"
                                                    class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    Dependencia guardado satifactoriamente
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div id="dependencedanger"
                                                    class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Ocurrio un error al guardar el dependencia.
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" id="namedependencia" class="form-control"
                                                            placeholder="Nombre dependencia" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Id dependencia</th>
                                            <th class="thead-fix" scope="col">Nombre dependencia</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodydepencia">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade text-center" id="users" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="" role="form" id="datos_estudiante">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"><strong>Buscar usuario</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" placeholder="Cedula o nombre usuario">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-light border">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target=".bd-example-modal-xl">
                                    <i class="fa fa-plus"></i> Agregar usuarios
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-xl" id="" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar administrador de
                                                sistema</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="text-center">Informacion personal</h5>
                                            <hr>
                                            <form class="" role="form" id="">
                                                <div class="form-group row">
                                                    <label for="idcedula" class="col-md-1 control-label">Cédula</label>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control input-sm" id="idcedula"
                                                            placeholder="Numero de cédula" required>
                                                    </div>
                                                    <label for="idnombre1" class="col-md-1 control-label">Primer
                                                        nombre</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm" id="idnombre1"
                                                            placeholder="Primer nombre">
                                                    </div>
                                                    <label for="idnombre2" class="col-md-1 control-label">Segundo
                                                        nombre</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm" id="idnombre2"
                                                            placeholder="Segundo nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="idapellido1" class="col-md-1 control-label">Primer
                                                        apellido</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm"
                                                            id="idapellido1" placeholder="Primer apellido">
                                                    </div>
                                                    <label for="idapellido2" class="col-md-1 control-label">Segundo
                                                        apellido</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-sm"
                                                            id="idapellido2" placeholder="Primer apellido">
                                                    </div>
                                                    <label for="idtelefono"
                                                        class="col-md-1 control-label">Telefono</label>
                                                    <div class="col-md-3">
                                                        <input type="number" class="form-control input-sm"
                                                            id="idtelefono" placeholder="Numero telefonico">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="idcorreo" class="col-md-1 control-label">Correo</label>
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control input-sm" id="idcorreo"
                                                            placeholder="Correo electronico" required>
                                                    </div>
                                                    <label for="iddireccion" class="col-md-2 control-label">Dirección
                                                        recidencial</label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control input-sm"
                                                            id="iddireccion" placeholder="Dirección de residencia">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tel1" class="col-md-1 control-label">Estado</label>
                                                    <div class="col-md-5">
                                                        <select class='form-control input-sm' id="condiciones1">
                                                            <option value="none">-- Selecciona un estado --</option>
                                                            <option value="1">Activo</option>
                                                            <option value="0">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h5 class="text-center">Datos de acceso</h5>
                                                <hr>
                                                <div class="form-group row">
                                                    <label for="nombre_cliente"
                                                        class="col-md-1 control-label">Usuario</label>
                                                    <div class="col-md-4">
                                                        <select class='form-control input-sm' id="condiciones2">
                                                            <option value="none">-- Selecciona un tipo de usuario --
                                                            </option>
                                                            <option value="Administrador">Administrador</option>
                                                            <option value="Tecnico">Tecnico</option>
                                                        </select>
                                                    </div>
                                                    <label for="idpassword" class="col-md-2 control-label">Contraseña de
                                                        acceso</label>
                                                    <div class="col-md-4">
                                                        <input type="password" class="form-control input-sm"
                                                            id="idpassword" placeholder="Digite su contraseña" required
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
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
                                    <tbody id="usuarios">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade text-center" id="etiquetas" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <form class="" role="form" id="formsearchetiqueta">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-2 col-form-label"><strong>Etiqueta</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" id="etiquetasearch" class="form-control"
                                            placeholder="Id o etiqueta">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-light border"
                                            id="btnsearchetiqueta">Buscar</button>
                                    </div>
                                    <span id="loader"></span>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn-open-eti btn btn-success" data-toggle="modal"
                                    data-target="#staticBackdrop2eti">
                                    <i class="fa fa-plus"></i> Agregar etiquetas
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop2eti" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar Etiquetas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body ">
                                            <div id="etiquesuccess"
                                                class="alert alert-success alert-dismissible fade show" role="alert">
                                                Etiqueta guardado satifactoriamente
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="etiquedanger"
                                                class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Ocurrio un error al guardar el Etiqueta.
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formetiqueta" class="pt-0">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="nametiqueta"
                                                            placeholder="Nombre del etiqueta" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success"
                                                        id="successetiqueta">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Id etiqueta</th>
                                            <th class="thead-fix" scope="col">Nombre del etiqueta</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyetiqueta">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade text-center" id="aulas" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="" role="form" id="formsearchaulas">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-2 col-form-label"><strong>Aulas</strong></label>
                                    <div class="col-md-7">
                                        <input type="text" id="aulassearch" class="form-control"
                                            placeholder="Id o nombre aula">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-light border"
                                            id="btnsearchaulas">Buscar</button>
                                    </div>
                                    <span id="loader"></span>
                                </div>
                            </form>
                            <div class="btn-group align-items-center" type="button" class="">
                                <button type="button" class="btn-open-aula btn btn-success" data-toggle="modal"
                                    data-target="#staticBackdrop2aula">
                                    <i class="fa fa-plus"></i> Agregar aulas
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop2aula" data-backdrop="static" tabindex="-1"
                                role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Agregar aulas de clase</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="aulasuccess"
                                                class="alert alert-success alert-dismissible fade show" role="alert">
                                                Aula guardada satifactoriamente
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="auladanger" class="alert alert-danger alert-dismissible fade show"
                                                role="alert">
                                                Ocurrio un error al guardar el aula.
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formaulas" class="pt-0">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="nameaula"
                                                            class="control-label float-left">Aula</label>
                                                        <input type="text" class="form-control" id="nameaulas"
                                                            placeholder="Nombre del aula" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="sedes"
                                                            class="control-label float-left">Sedes</label>
                                                        <select class='form-control' id="sedes" name="sedes"
                                                            required>
                                                            <option value=""> -- : -- -- </option>
                                                            <option value="Sede A">Sede A</option>
                                                            <option value="Sede B">Sede B</option>
                                                            <option value="Sede C">Sede C</option>
                                                            <option value="Sede E">Sede E</option>
                                                            <option value="Casa blanca">Casa blanca</option>
                                                            <option value="Consultorio Juridico">Consultorio Juridico
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="estado" class="control-label float-left">Estado del
                                                            aula</label>
                                                        <select name="estado" id="estado" class="form-control" required>
                                                            <option value=""> -- : -- -- </option>
                                                            <option value="Funcionando">Funcionando</option>
                                                            <option value="Fuera servicio">Fuera servicio</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 activos">
                                                        <label for="activo" class="control-label float-left">Activo </label>
                                                        <select name="estado" id="activo" class="form-control">
                                                            <option value=""> -- : -- -- </option>
                                                            <option value="1">Activo</option>
                                                            <option value="0">Inactivo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">Guardar</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive" style="max-height: 230px;">
                                <table class="table table-hover table-sm" style="white-space: nowrap">
                                    <thead>
                                        <tr class="table-success">
                                            <th class="thead-fix" scope="col">Id aula</th>
                                            <th class="thead-fix" scope="col">Sede</th>
                                            <th class="thead-fix" scope="col">Aula</th>
                                            <th class="thead-fix" scope="col">Estado</th>
                                            <th class="thead-fix text-center" scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyaula">
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
<?php include_once 'Public/view/view/footer.php'?>