<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/Views/css/style.css">
    <link rel="stylesheet" href="/proyecto/Views/css/contacto.css">
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
        <form>
            <label for="fname">Nombre</label>
            <input type="text" id="fname" name="firstname" placeholder="Tu Nombre..">
        
            <label for="email">Correo Electronico</label>
            <input type="text" id="email" name="email" placeholder="Tu correo electronico..">
        
            <label for="subject">Mensaje</label>
            <textarea id="subject" name="subject" placeholder="Escribe tu duda..." style="height:200px"></textarea>
        
            <input type="submit" value="Enviar">
        
        </form>
    </div>
    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d274.6808576738365!2d-101.0069954611741!3d22.13930214346459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842a98c89a58c9fb%3A0xc54712a1a4051c4a!2sCollision%20Center%20San%20Luis!5e0!3m2!1ses-419!2smx!4v1619927153500!5m2!1ses-419!2smx" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</body>
</html>