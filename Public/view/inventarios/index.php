<?php include_once 'Public/view/view/header.php' ?>
<div class="container-fluid pt-4">
    <div class="card border-secondary mb-3">
        <div class="card-header bg-light">
            <div type="button" class="btn-group float-md-right">
                <a class="btn btn-ligh border" href="<?php echo URL . 'inventarios/equipos' ?>"><i
                        class="fas fa-plus-circle"></i> Nuevo equipo</a>
                <a class="btn btn-ligh border" href="<?php echo URL . 'inventarios/utilidades' ?>"><i
                        class="fas fa-tools"></i> Nueva utilidad</a>
            </div>
            <h5 class="text-dark">Siret</h5>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="btn-group-vertical">
                        <?php 
                        foreach($datos as $row){
                            if($row['descripcion'] == 'Video'){
                                ?>
                        <a href="<?php echo URL . 'inventarios/equipo/' . $row['descripcion'] ?>"
                            class="btn btn-secondary pt-3 text-left"><i class="fas fa-video"></i>
                            <?php echo $row['descripcion'] ?></a>
                        <?php
                            }else if($row['descripcion'] == 'Portatil'){
                                ?>
                                <a href="<?php echo URL . 'inventarios/equipo/' . $row['descripcion'] ?>"
                                    class="btn btn-secondary pt-3 text-left"><i class="fas fa-laptop"></i>
                                    <?php echo $row['descripcion'] ?></a>
                                <?php
                            }
                            ?>

                        <?php
                        }
                    ?>
                        <a href="<?php echo URL . 'inventarios/equipo/utilidades' ?>"
                            class="btn btn-secondary pt-3 text-left"><i class="fas fa-tools"></i> Utilidades</a>

                        <div class="btn-group" role="group">

                            <button id="btnGroupDrop1" type="button"
                                class="btn btn-secondary dropdown-toggle pt-3 text-left" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> Otros</span>
                            </button>
                            <div class="dropdown-menu pt-3" aria-labelledby="btnGroupDrop1">
                                <?php 
                                    foreach($datos as $row){
                                        if($row['descripcion'] != 'Video' && $row['descripcion'] != 'Portatil' && $row['descripcion'] != 'Audio'){
                                            ?>
                                            <a class="dropdown-item" href="#"> <?php echo $row['descripcion']?></a>
                                            <?php
                                        }
                                    }
                                ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 border rounded pb-3">
                    <div class="row">

                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de video beam</h5>
                                    <p class="card-text">Registro de video beam, Cantidad: <br> En calidad de prestamos:
                                    </p>
                                    <a href="<?php echo URL . 'inventarios/siret/videobeam'; ?>"
                                        class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tabla de portatiles</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/portatil'; ?>"
                                        class="btn btn-success">Ir al inventario</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Table de utilidades</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="<?php echo URL . 'inventarios/siret/utilidades'; ?>"
                                        class="btn btn-success">Ir al inventario</a>
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