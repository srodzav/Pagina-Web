<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="../css/registrarse.css">
    <title>Registrarse</title>
</head>
<body>

    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Registrarse </h1>
    </div>
    
    <hr style="width:100%;text-align:left;margin-left:0">

    <!-- PARA REGISTRARSE -->
    <div class="formulario">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarUsuariosController.php">
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="elpanal@correo.com" name="email" id="email" autocomplete="off" required>
            
                <label for="psw"><b>Contraseña</b></label>
                <input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="off" required>
            
                <label for="psw-repeat"><b>Repetir Contraseña</b></label>
                <input type="password" placeholder="Repetir Contraseña" name="password-repeat" id="password-repeat" autocomplete="off" required>
                <hr>

                <button type="submit" onclick="registrarse()" class="registerbtn">Registrarse</button>
            </div>
            <div class="container signin">
                <p>Tienes una cuenta? <a href="login.php">Entrar</a>.</p>
            </div>
        </form>
    </div>

    <script src="/PROYECTO/Views/js/registrarse.js"></script>
</body>
</html>