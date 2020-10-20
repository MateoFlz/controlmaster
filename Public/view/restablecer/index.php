<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema integrado de prestamo</title>
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/css/custom.css'?>">
    <link rel="stylesheet" href="<?php echo URL . 'Public/assets/font-awesome/css/all.min.css'?>">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<div class="container h-100 vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="card h-50 w-50">
            <div class="card-header">
                <h3 class="text-center">Restablecer contraseña</h3>
            </div>
            
            <div class="card-body">

                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if(strpos($fullUrl, "login=false") ==  true){
                        echo '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Usuario y/o Contraseña incorrecta.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        ';
                    }

                    if(strpos($fullUrl, "session=false") ==  true){
                        echo '
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Por favor, ingrese usuario y contraseña!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        ';
                    }
                ?>

                <form data-toggle="validator" role="form" method="POST" action="<?php echo URL ?>index/login">
                    <input type="hidden" class="hide" id="csrf_token" name="csrf_token" value="C8nPqbqTxzcML7Hw0jLRu41ry5b9a10a0e2bc2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email / Usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="login_email" value="" pattern="[0-9]{4,11}" title="once(11) o menos, solo numeros" required="" placeholder="Digita tú correo electronico">
                                </div>
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="redirect" value="">
                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Enviar" name="submit">
                        </div>
                    </div>
                </form>
                <div class="clear"></div>
                <i class="fa fa-undo fa-fw"></i> Regresar <a href="<?php echo URL . 'index/'?>">Aqui!</a>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Public/view/view/footer.php'?>
