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

    $mensaje = "SELECT * FROM mensaje";

    if(isset($_POST['eliminar']))
    {
        $id = $_POST['eliminar'];

        $sql = "DELETE FROM mensaje WHERE id = $id";

        if($connection->query($sql) === true){
            //echo "LOGRADO JEFE";
        }else {
            die("Error al actualizar datos: " . $connection->error);
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
    <link rel="stylesheet" href="/PROYECTO/Views/css/contacto.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Contacto - Admin</title>
</head>
<body>

    <?php include('admin_header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Panel de Control: Contacto </h1>
        <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div>
        <h3 style="text-align: center;"> Bandeja de entrada </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
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
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/cli/admin_contacto.php">
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