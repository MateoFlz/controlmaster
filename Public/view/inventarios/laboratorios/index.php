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
                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-database"></i> Ingenieria</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">Laboratorio de Mantenimiento Electrónico</a>
                                <a class="dropdown-item" href="#">Laboratorio de Mantenimiento de computadores</a>
                            </div>
                        </div>   
                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-database"></i> Comunicacion Social</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#">Laboratorio Diseño y composición de imágenes</a>
                                <a class="dropdown-item" href="#">Laboratorio de Radio</a>
                            </div>
                        </div>
                        <div class="btn-group" role="group">

                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i> Fisioterapia</span>
                        </button>
                        <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#"> Laboratorio de Fisiología y Prescripción del Ejercicio</a>
                            <a class="dropdown-item" href="#"> Laboratorio de Neurorehabilitación</a>
                            <a class="dropdown-item" href="#"> Laboratorio De Intervención</a>
                            <a class="dropdown-item" href="#"> Laboratorio Múltiple Del Área De La Salud</a>
                            <a class="dropdown-item" href="#"> Laboratorio De Cuidado Crítico</a>
                            <a class="dropdown-item" href="#"> Laboratorio Morfofisiología</a>
                        </div>
                        </div>
                        <a href="<?php echo URL . 'inventarios/siret/audio'?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-volume-up"></i> Laboratorio de Prácticas Contables</a>
                        <a href="<?php echo URL . 'inventarios/siret/utilidades'?>" class="btn btn-secondary pt-3 text-left"><i class="fas fa-tools"></i> Laboratorio de Ciencias Básicas</a>
                    </div>
                </div>
                <div class="col-10 border rounded pb-3">
                    <div class="row">
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de video beam</h5>
                                    <p class="card-text">Registro de video beam, Cantidad: <br> En calidad de prestamos:  </p>
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