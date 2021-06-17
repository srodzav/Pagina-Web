<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }
    if(!isset($_SESSION['usuario'])){
        header('location: login.php');
    }

    $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
    mysqli_set_charset($connection, "utf8");

    $usuario = $_SESSION['usuario'];

    $mensaje = "SELECT * FROM ordenes WHERE usuario = '$usuario' ORDER BY id DESC";

    if(isset($_POST['eliminar']))
    {
        $id = $_POST['eliminar'];

        $sql = "DELETE FROM ordenes WHERE id = $id";

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
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Mis Pedidos - El Panal</title>
</head>
<body>

    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Mis pedidos: <?php echo $_SESSION['usuario'] ?> </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div style="text-align: center;">
        <img src="/PROYECTO/Views/images/delivery.gif" style="width=100%; height=100%;">
    </div>
    
    <div class="tabla-pedidos">
        <table>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Usuario</th>
            </tr>

            <?php $resultado = mysqli_query($connection, $mensaje); 

            while($row = mysqli_fetch_assoc($resultado))
            { ?>
                <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> <?php echo $row["nombre"]?> </td>
                    <td> <?php echo $row["cantidad"]?> </td>
                    <td> <?php echo $row["precio"]?> </td>
                    <td> <?php echo $row["usuario"]?> </td>

                    <td> 
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/php/mispedidos.php">
                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                            <input type="submit" value="Cancelar"> 
                        </form>
                    </td>
                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
    </div> 
    <br><br><br><br><br><br>
</body>
</html>