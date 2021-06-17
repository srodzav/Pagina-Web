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

    $mensaje = "SELECT * FROM productos";

    if(isset($_POST['eliminar']))
    {
        $id = $_POST['eliminar'];

        $sql = "DELETE FROM productos WHERE id = $id";

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
    <link rel="stylesheet" href="/PROYECTO/Views/css/menu.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/carrito.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Menu - Admin</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
</head>
<body>

    <?php include('admin_header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Panel de Control: Menu </h1>
        <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    
    <div>
        <h3 style="text-align: center;"> Añadir Producto </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <br>

    <div class="formulario">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarProductoController.php">
            <div class="container">
                <label for="email"><b>Nombre</b></label>
                <input type="text" name="nombre" id="nombre" autocomplete="off" required>
            
                <label for="descripcion"><b>Descripcion</b></label>
                <input type="text" name="descripcion" id="descripcion" autocomplete="off" required>

                <label for="precio"><b>Precio</b></label>
                <input type="text" name="precio" id="precio" autocomplete="off" required>
            
                <label for="imagen"><b>Imagen</b></label>
                <input type="file" name="file" id="file">

                <button type="submit" class="registerbtn">Añadir</button>
            </div>
        </form>
    </div>

    <div>
        <h3 style="text-align: center;"> Editar Productos </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="tabla-pedidos">
        <table>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Eliminar</th>
            </tr>

            <?php $resultado = mysqli_query($connection, $mensaje); 

            while($row=mysqli_fetch_assoc($resultado))
            { ?>
                <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> <?php echo $row["nombre"]?> </td>
                    <td> <?php echo $row["descripcion"]?> </td>
                    <td> <?php echo $row["precio"]?> </td>
                    <td> <?php echo $row["imagen"]?> </td>

                    <td> 
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/cli/admin_menu.php">
                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                            <input type="submit" value="X"> 
                        </form>
                    </td>
                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
    </div> 
    <br><br><br><br><br><br>
</body>
</html>