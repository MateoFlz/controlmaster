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
                        <a href="<?php echo URL . 'videobeam'; ?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-video"></i> Video beam</a>
                        <button type="button" class="btn btn-secondary pt-3 text-left"><i class="fas fa-laptop"></i> Portatiles</button>

                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-database"></i> Consumibles</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">Dropdown link</a>
                                <a class="dropdown-item" href="#">Dropdown link</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary pt-3 text-left"><i class="fas fa-volume-up"></i> Audios</button>
                        <button type="button" class="btn btn-secondary pt-3 text-left"><i class="fas fa-tools"></i> Utilidades</button>
                        <button type="button" class="btn btn-secondary pt-3 text-left"><i class="fas fa-cog"></i> Otros</button>
                    </div>
                </div>
                <div class="col-10 border rounded pb-3">
                    <div class="row">
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de video beam</h5>
                                    <p class="card-text">Registro de video beam, Cantidad: <br> En calidad de prestamos:  </p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de portatiles</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de consumibles</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de sonido</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Table de utilidades</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Table de otros accesorios</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-success">Ir al inventario</a>
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