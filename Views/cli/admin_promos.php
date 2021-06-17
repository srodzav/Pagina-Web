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

    $mensaje_productos = "SELECT * FROM productos";
    $mensaje = "SELECT * FROM promociones";

    if(isset($_POST['eliminar']))
    {
        $id = $_POST['eliminar'];

        $sql = "DELETE FROM promociones WHERE id = $id";

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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/menu.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/carrito.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
    <title>Promos - Admin</title>
</head>
<body>

    <?php include('admin_header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Panel de Control: Promos </h1>
        <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div>
        <h3 style="text-align: center;"> Añadir Promocion </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <br>

    <div class="formulario">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarPromocionController.php">
            <div class="container">
                <label for="nombre"><b>Nombre</b></label>
                <input class="input-promo" type="text" name="nombre" id="nombre" autocomplete="off" required>

                <label for="productos"><b>Productos</b></label>
                <input class="input-promo" type="text" name="producto1" list="productos">
                <datalist id="productos">
                    <?php 
                        $resultado = mysqli_query($connection, $mensaje_productos); 
                        while($row=mysqli_fetch_assoc($resultado))
                        { ?>
                            <option value="<?php echo $row["nombre"]?>" >
                    <?php } mysqli_free_result($resultado); ?>
                </datalist> 

                <input class="input-promo" type="text" name="producto2" list="productos">
                <datalist id="productos">
                    <?php 
                        $resultado = mysqli_query($connection, $mensaje_productos); 
                        while($row=mysqli_fetch_assoc($resultado))
                        { ?>
                            <option value="<?php echo $row["nombre"]?>" >
                    <?php } mysqli_free_result($resultado); ?>
                </datalist> 

                <input class="input-promo" type="text" name="producto3" list="productos">
                <datalist id="productos">
                    <?php  
                        $resultado = mysqli_query($connection, $mensaje_productos); 
                        while($row=mysqli_fetch_assoc($resultado))
                        { ?>
                            <option value="<?php echo $row["nombre"]?>" >
                    <?php } mysqli_free_result($resultado); ?>
                </datalist>

                <label for="precio"><b>Precio</b></label>
                <input class="input-promo" type="text" name="precio" id="precio" autocomplete="off" required>
            
                <label for="imagen"><b>Imagen</b></label>
                <input class="input-promo" type="file" name="file" id="file">

                <button type="submit" class="registerbtn">Añadir</button>
            </div>
        </form>
    </div>
    <div>
        <h3 style="text-align: center;"> Editar Promociones </h3>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="tabla-pedidos">
        <table>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Producto 1</th>
                <th>Producto 2</th>
                <th>Producto 3</th>
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
                    <td> <?php echo $row["producto1"]?> </td>
                    <td> <?php echo $row["producto2"]?> </td>
                    <td> <?php echo $row["producto3"]?> </td>
                    <td> <?php echo $row["precio"]?> </td>
                    <td> <?php echo $row["imagen"]?> </td>

                    <td> 
                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/cli/admin_promos.php">
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