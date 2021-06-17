<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../../index.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> El Panal - Admin</title>
</head>
<body>

    <?php include('admin_header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Menú Principal del Administrador </h1>
        <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="center">
        <h3> ¿Que puedes hacer siendo administrador? </h3>
        <ul>
            <li>Agregar y editar nuevos platillos o productos</li>
            <li>Agregar nuevas promociones o eliminar viejas promociones</li>
            <li>Manejar y ver las estadisticas de la pagina de Instragram</li>
            <li>Leer los mensajes que dejan los clientes</li>
        </ul>
    </div>
    <div class="center">
        <img class="img-p" src="../images/server.png">
    </div>
</body>
</html>