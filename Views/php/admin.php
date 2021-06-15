<?php
    $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
    mysqli_set_charset($connection, "utf8");

    $usuarios = "SELECT * FROM usuarios";

    session_start();
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
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Admin - El Panal</title>
</head>
<body>
    
    <?php include('header.php') ?>
    <?php 
        if(isset($_POST['eliminar']))
        {
            $id = $_POST['eliminar'];

            $sql = "DELETE FROM usuarios WHERE id = $id";

            if($connection->query($sql) === true){
                //echo "LOGRADO JEFE";
            }else {
                die("Error al actualizar datos: " . $connection->error);
            }
        }
    ?>

    <div>
        <h1 style="text-align: center;"> Panel de Administración </h1>
        <!-- <h2 style="text-align: center;">Bienvendio: <?php echo $_SESSION['usuario']; ?> </h2> -->
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <br>

    <div class="tabla-usuarios">
        <table>
            <tr>
                <th>id</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Eliminar</th>
            </tr>

            <?php $resultado = mysqli_query($connection, $usuarios); 

            while($row=mysqli_fetch_assoc($resultado))
            { ?>
                <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> <?php echo $row["email"]?> </td>
                    <td> <?php echo $row["contrasena"]?> </td>
                    <td> 
                        <?php
                            if($row["rol"] == 1)
                                echo "Administrador";
                            else
                                echo "Usuario";
                        ?>
                    </td>

                    <td> 
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/proyecto/Views/php/admin.php">
                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                            <input type="submit" value="X"> 
                        </form>
                    </td>

                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
        
        <div>
            <h3 style="text-align: center;"> Añadir Administrador </h3>
        </div>
        <hr style="width:100%;text-align:left;margin-left:0">
        <br>

        <div class="formulario">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarAdministradorController.php">
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="elpanal@correo.com" name="email" id="email" autocomplete="off" required>
            
                <label for="psw"><b>Contraseña</b></label>
                <input type="password" placeholder="Contraseña" name="password" id="password" autocomplete="off" required>

                <button type="submit" class="registerbtn">Añadir</button>
            </div>
        </form>

    </div>
    </div>
</body>
</html>