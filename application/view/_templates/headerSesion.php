<!DOCTYPE html>
<html lang="en">
<head>

    <link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/main.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/slider.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

    

    <meta charset="utf-8">
    <title>Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body >
<br>
<br>
    <!-- logo -->
    <div class="container">
        <div class="row">
          <div class="col-md-12">

              <p id="titulo"> <strong>Conception</strong></p>
              <p id="Subtitulo"> <strong>Moda & Estilo</strong></p>

          </div>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
          
                <div id="menu" class='rmm'>
                <ul>
                    <div class="navigation">
                        <a href="#">Inicio</a>
                        <a href="" class="hsubs" data-toggle="modal" data-target="#Chat">Chat</a>
                        <?php echo $_SESSION["Menu"]; ?>
                        <a href="<?php echo URL; ?>datosPersonales/index">Datos Personales</a>
                        <a href="<?php echo URL; ?>login/cerrarSesion">Cerrar</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <br>

    