<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Lienzo</title>
        <link href="<?php echo BASE_PUBLIC;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo BASE_PUBLIC;?>js/jquery-2.1.4.js"></script>
        <script type="text/javascript" src="<?php echo BASE_PUBLIC;?>js/bootstrap.min.js"></script>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body> 
        <form action="<?php echo $helper->url("usuarios","guardaredicion"); ?>" method="post" class="col-lg-5">
            <h3>Editar usuario</h3>
            <hr/>
            <input type="hidden" name='id' value="<?php echo $allusers->id;?>">
            Nombre: <input type="text" name="nombre" value="<?php echo $allusers->nombre;?>" class="form-control"/>
            Apellido: <input type="text" name="apellido" value="<?php echo $allusers->apellido;?>" class="form-control"/>
            Email: <input type="text" name="email" value="<?php echo $allusers->apellido;?>" class="form-control"/>
            Contraseña: <input type="password" name="password" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
    </body>
</html>