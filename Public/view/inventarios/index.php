<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <h5 class="text-dark">Siret</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="btn-group-vertical">
                        <a href="<?php echo URL . 'inventarios/siret/videobeam'; ?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-video"></i> Video beam</a>
                        <a href="<?php echo URL . 'inventarios/siret/portatil' ?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-laptop"></i> Portatiles</a>

                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-database"></i> Consumibles</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">Uso rapido</a>
                                <a class="dropdown-item" href="#">Reutilizables</a>
                            </div>
                        </div>
                        <a href="<?php echo URL . 'inventarios/siret/audio' ?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-volume-up"></i> Audios</a>
                        <a href="<?php echo URL . 'inventarios/siret/utilidades' ?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-tools"></i> Utilidades</a>

                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> Otros</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#"> Componentes</a>
                                <a class="dropdown-item" href="#"> Genericos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 border rounded pb-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body col-12 border mt-3 rounded">
                                <div class="form-group row justify-content-center">
                                    <div type="button" class="btn-group pl-4">
                                        <a class="btn btn-success" href="<?php echo URL . 'inventarios/equipos' ?>"><i class="fa fa-user-plus"></i> Nuevo equipo tecnologico</a>
                                    
                                    </div>
                                    <div type="button" class="btn-group pl-4">
                                        <a class="btn btn-success" href="<?php echo URL . 'inventarios/utilidades' ?>"><i class="fa fa-user-plus"></i> Nuevo utilidad tecnologica</a>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de video beam</h5>
                                    <p class="card-text">Registro de video beam, Cantidad: <br> En calidad de prestamos: </p>
                                    <a href="<?php echo URL . 'inventarios/siret/videobeam'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de portatiles</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/portatil'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de consumibles</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/videobeam'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de sonido</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/audio'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Table de utilidades</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/utilidades'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Table de otros accesorios</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/otro'; ?>" class="btn btn-success">Ir al inventario</a>
                                </div>
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