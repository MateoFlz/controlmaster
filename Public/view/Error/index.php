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
<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Lo sentimos, se ha producido un error, no se encontró la página solicitada!
                </div>
                <div class="error-actions">
                    <a href="<?php echo URL ?>dashboard" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Llévame a casa </a><a href="http://www.jquery2dotnet.com" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'Public/view/view/footer.php'?>