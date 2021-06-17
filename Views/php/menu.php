<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
    <title>Menu - El Panal</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
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
        <h1 style="text-align: center;"> Menú </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    
    <?php $mensaje = "SELECT * FROM productos"; ?>
    <div class="container">
        <div class="w-40 obj">
            <section id="our_menu" class="bcolor2">
                <?php $resultado = mysqli_query($connection, $mensaje); 
                while($row=mysqli_fetch_assoc($resultado))
                {?>
                    <div class="single_menu bcolor3">
                        <div class="menu_content">
                            <h4> <?php echo $row["nombre"] ?> <span>$ <?php echo $row["precio"] ?></span></h4>
                            <p> <?php echo $row["descripcion"] ?> </p>
                            <img src="../../Controllers/uploads/<?php echo $row["imagen"]?>">
                            <br>
                            <button class="boton-carrito" onClick="addCarrito('<?php echo $row["nombre"]?>', <?php echo $row["precio"]?>, '<?php echo $row["imagen"]?>', '<?php echo $row["descripcion"]?>', '<?php echo $_SESSION['usuario'] ?>')">Añadir al carrito</button>
                        </div>
                    </div>
                <?php } mysqli_free_result($resultado); ?>
            </section>
        </div>
        <div class="w-75 obj">
            <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarOrdenesController.php">
                <button type="submit" class="ordernarbtn"> ¡Ordenar! </button>
                <div class="shopping-cart" id="carrito"required>
                    <!-- SE AÑADEN LOS ITEMS -->
                </div>
            </form>
        </div>
    </div>
    
    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }if(!isset($_SESSION['rol'])){}else
        if($_SESSION['rol'] == 1){ ?>
            <hr style="width:100%;text-align:left;margin-left:0">
            <div>
                <h3 style="text-align: center;"> Añadir Producto </h3>
                <h4 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h4>
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
    <?php } ?>

    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");

        $mensaje = "SELECT * FROM promociones";

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if(!isset($_SESSION['rol'])){}else
        if($_SESSION['rol'] == 1){
            ?>
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
                                <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/php/contacto.php">
                                    <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                                    <input type="submit" value="X"> 
                                </form>
                            </td>
                        </tr>
                    <?php } mysqli_free_result($resultado); ?>
                </table>
            </div> 
        <?php } ?>
        <br><br><br><br><br><br>
    
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script type="text/javascript" src="/PROYECTO/Views/js/menu.js"></script>
</body>
</html>