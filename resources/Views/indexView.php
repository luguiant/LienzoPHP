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
        <form action="<?php echo $helper->url("usuarios","crear"); ?>" method="post" class="col-lg-5">
            <h3>Añadir usuario</h3>
            <hr/>
            Nombre: <input type="text" name="nombre" class="form-control"/>
            Apellido: <input type="text" name="apellido" class="form-control"/>
            Email: <input type="text" name="email" class="form-control"/>
            Contraseña: <input type="password" name="password" class="form-control"/>
            <input type="submit" value="enviar" class="btn btn-success"/>
        </form>
        
        <div class="col-lg-7">
            <h3>Usuarios</h3>
            <hr/>
        </div>
        <section class="col-lg-7 usuario" style="height:400px;overflow-y:scroll;">
            <?php foreach($allusers as $user) {?>
                <?php echo $user->id; ?> -
                <?php echo $user->nombre; ?> -
                <?php echo $user->apellido; ?> -
                <?php echo $user->email; ?>
                <div class="right">
                    <a href="<?php echo $helper->url("usuarios","borrar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Borrar</a>
                </div>
                <div class="right">
                    <a href="<?php echo $helper->url("usuarios","editar"); ?>&id=<?php echo $user->id; ?>" class="btn btn-danger">Editar</a>
                </div>
                <hr/>
            <?php } ?>
        </section>

    </body>
</html>