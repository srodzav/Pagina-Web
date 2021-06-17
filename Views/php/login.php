<?php
    include('../../Models/db.php');

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: /PROYECTO/Views/php/admin.php');
                break;
            case 2:
                header('location: /PROYECTO/index.php');
                break;
            default:
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/registrarse.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Iniciar Sesion </h1>
    </div>
    
    <hr style="width:100%;text-align:left;margin-left:0">
    
    <!-- PARA LOGEARSE -->
    <div class="formulario">
        <form method="POST" id="form_login" action="sesiones.php"> 
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="elpanal@correo.com" name="email" id="email" autocomplete="off" required>
            
                <label for="password"><b>Contraseña</b></label>
                <input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="off" required>

                <input type="submit" class="registerbtn" value="Iniciar Sesión">
            </div>

            <div class="container signin">
                <p>No tienes una cuenta? <a href="registrarse.php">Registrarse</a>.</p>
            </div>
        </form>
    </div>
</body>
</html>