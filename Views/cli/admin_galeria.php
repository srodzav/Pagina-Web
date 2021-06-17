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

    $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
    mysqli_set_charset($connection, "utf8");

    $mensaje = "SELECT * FROM instagram";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/galeria.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Galeria - Admin</title>
</head>
<body>

    <?php include('admin_header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Panel de Control: Galeria </h1>
        <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div>
        <h3 style="text-align: center;"> Panel de Administración Instagram </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <br>

    <div class="container upload">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarInstagramController.php">
            <h2>Subir Foto</h2>
            <input type="file" name="file" multiple>
            <button type="submit">Subir</button>
        </form>
    </div>
    <div class="tabla-usuarios">
        <table>
            <tr>
                <th>id</th>
                <th>@usuario</th>
                <th>Fecha de subida</th>
                <th>Comentarios</th>
                <th>Interacciones</th>
            </tr>

            <?php $resultado = mysqli_query($connection, $mensaje); 

            while($row=mysqli_fetch_assoc($resultado))
            { ?>
                <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> 
                        <?php 
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $randomString = '';
                            for ($i = 0; $i < 10; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            echo $randomString;
                        ?> 
                    </td>
                    <td> <?php echo $row["uploaded_on"]?> </td>
                    <td> <?php echo $row["comments"] ?> </td>
                    <td> <?php echo $row["likes"] ?> </td>
                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
    </div>

</body>
</html>