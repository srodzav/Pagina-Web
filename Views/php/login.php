<?php
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    
    // $error = "";
    // $success = "";
    // $msg = "";

    // $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    // $connection = mysqli_connect("localhost","root","qwert","panal_db");
    // if(!$connection){ $error = "Error al conectar a la base de datos"; }

    // $result = mysqli_query($connection, $sql);
    // $row = mysqli_fetch_array($result);
    
    // if($row){
    //     if($row["contrasena"] == $password){
    //         $error = "";
    //         $success = "Bienvendio ".$email;
    //         $msg = "Logout";
    //     } else {
    //         $error = "Contraseña Incorrecta";
    //         $success = "";
    //         $msg = "Intenta de nuevo";
    //     }
    // } else {
    //     $error = "Correo Invalido";
    //     $success = "";
    //     $msg = "Intena de nuevo";
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/Views/css/style.css">
    <link rel="stylesheet" href="/proyecto/Views/css/registrarse.css">
    <title>Iniciar Sesion</title>
</head>
<body>
    
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Iniciar Sesion </h1>
    </div>
    
    <hr style="width:100%;text-align:left;margin-left:0">

    <!-- <p class="error"> <?php echo $error; ?> </p> 
    <p class="success"> <?php echo $success; ?> </p> -->
    
    <!-- PARA LOGEARSE -->
    <form method="POST" id="form_login"> 
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="elpanal@correo.com" name="email" id="email" autocomplete="off" required>
        
            <label for="password"><b>Contraseña</b></label>
            <input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="off" required>

            <button type="submit" class="registerbtn">Iniciar Sesion</button>
        </div>
      
        <div class="container signin">
            <p>No tienes una cuenta? <a href="registrarse.php">Registrarse</a>.</p>
        </div>
    </form>
    <script src="/proyecto/Views/js/registrarse.js"></script>
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
    </script>
</body>
</html>