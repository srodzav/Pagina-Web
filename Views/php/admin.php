<?php
    $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
    mysqli_set_charset($connection, "utf8");

    $usuarios = "SELECT * FROM usuarios";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/Views/css/style.css">
    <link rel="stylesheet" href="/proyecto/Views/css/admin.css">
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
        <h1 style="text-align: center;"> Usuarios Registrados </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <br>

    <div class="tabla-usuarios">
        <table>
            <tr>
                <th>id</th>
                <th>Correo</th>
                <th>Contraseña</th>
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
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/proyecto/Views/php/admin.php">
                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                            <input type="submit" value="X"> 
                        </form>
                    </td>

                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
    </div>

</body>
</html>