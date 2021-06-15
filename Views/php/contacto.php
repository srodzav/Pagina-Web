<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/contacto.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Contacto - El Panal</title>
</head>
<body>
    
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Contacto </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <!-- CONTACTO -->
    <div class="container">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarComentarioController.php">
            <label for="fname">Nombre</label>
            <input type="text" id="fname" name="firstname" placeholder="Tu Nombre..">
        
            <label for="email">Correo Electronico</label>
            <input type="text" id="email" name="email" placeholder="Tu correo electronico..">
        
            <label for="message">Mensaje</label>
            <textarea id="message" name="message" placeholder="Escribe tu duda..." style="height:200px"></textarea>
        
            <button type="submit" class="registerbtn">Enviar</button>
        
        </form>
    </div>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d274.6808576738365!2d-101.0069954611741!3d22.13930214346459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a98c89a58c9fb%3A0xc54712a1a4051c4a!2sCollision%20Center%20San%20Luis!5e0!3m2!1ses-419!2smx!4v1619927153500!5m2!1ses-419!2smx" width="100%" height="200%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
        
    <br>
    <br>

    <div>
        <h3 style="text-align: center;"> Bandeja de entrada </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");

        $mensaje = "SELECT * FROM mensaje";

        session_start();
        if(!isset($_SESSION['rol'])){
            header('location: login.php');
        }else{
            if($_SESSION['rol'] == 1){
                ?>
                <div class="tabla-usuarios">
                    <table>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                        </tr>

                        <?php $resultado = mysqli_query($connection, $mensaje); 

                        while($row=mysqli_fetch_assoc($resultado))
                        { ?>
                            <tr>
                                <td> <?php echo $row["id"] ?> </td>
                                <td> <?php echo $row["firstname"]?> </td>
                                <td> <?php echo $row["email"]?> </td>
                                <td> <?php echo $row["message"]?> </td>

                                <td> 
                                    <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/php/contact.php">
                                        <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                                        <input type="submit" value="X"> 
                                    </form>
                                </td>

                            </tr>
                        <?php } mysqli_free_result($resultado); ?>
                    </table>
                </div> <?php
            }
        }
    ?>
</body>
</html>