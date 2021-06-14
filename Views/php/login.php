<?php
    include('../../Models/db.php');
    session_start();

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
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $contrasena = $_POST['password'];

        $db = new DB();
        $query = $db->getConnection()->prepare('SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena');
        $query->execute(['email' => $email, 'contrasena' => $contrasena]);

        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            $rol = $row[3];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('location: /PROYECTO/Views/php/admin.php');
                    break;
                case 2:
                    header('location: /PROYECTO/index.php');
                    break;
                default:
            }
        } else {
            echo
                '<script>
                alert("Usuario o contraseña incorrecto");
                </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
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
    <form method="POST" id="form_login" action="#"> 
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

    <!-- <script src="/proyecto/Views/js/registrarse.js"></script>
    <script>
        var form = document.getElementById("form_login");

        form.addEventListener("submit", login);

        function login(e) {
            //Validar usuario
            e.preventDefault();
            e.stopPropagation();

            //Guardar 
            var email = document.getElementById("email");
            var contasena = document.getElementById("password");

            var json = {
                email: email.value,
                contasena: contasena.value
            };

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", "/proyecto/Controllers/usuariosController.php", false);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        //window.location.href = "/proyecto/index.php";
                        console.log("Inicio de Sesión Exitoso");
                    }
                    else if (this.status == 500) {
                        var response = JSON.parse(this.responseText);
                        alert(response.messages[0]);
                    }
                    else if (this.status == 400) {
                        var response = JSON.parse(this.responseText);
                        alert(response.messages[0]);
                    }
                }
            };

            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send(JSON.stringify(json));
        }
    </script> -->
</body>
</html>