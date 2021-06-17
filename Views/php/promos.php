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
    <link rel="stylesheet" href="/PROYECTO/Views/css/promos.css">
    
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
    <title>Promos - El Panal</title>
</head>
<body>
   
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Promos </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="flex bcolor2">
        <div class="flex border justify-space w-100">
            <ul class="ul-promo">
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo1.jpg" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo2.jpg" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo3.PNG" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo4.PNG" class="img-promo"></li>
                <!-- <?php
                    $query = $connection->query("SELECT * FROM imagenes ORDER BY uploaded_on DESC");
                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = '/PROYECTO/Controllers/uploads/'.$row["file_name"]; ?>
                            <li><img src="<?php echo $imageURL; ?>" class="img-promo"></li>
                        <?php }
                    }
                ?> -->
            </ul>
        </div>
    </div>

    <div class="flex bcolor2">
        <div class="flex border justify-space w-100">
            <?php
                $query = $connection->query("SELECT * FROM promociones");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = '/PROYECTO/Controllers/uploads/'.$row["imagen"]; ?>
                        <ul class="ul-promo-generada bcolor3">
                            <li class="li-promo-generada">
                                <img src="<?php echo $imageURL; ?>" class="img-promo-generada">
                                <h3> <?php echo $row["nombre"] ?> </h3>
                                <p class="productos">1. <?php echo $row["producto1"] ?> </p>
                                <p class="productos">2. <?php echo $row["producto2"] ?> </p>
                                <p class="productos">3. <?php echo $row["producto3"] ?> </p>
                                <p>Costo: $<?php echo $row["precio"] ?> </p>
                            </li>
                            <button class="boton-carrito" onClick="addCarrito('<?php echo $row["nombre"]?>', <?php echo $row["precio"]?>, '<?php echo $row["imagen"]?>', '<?php echo $row["producto1"]?>', '<?php echo $row["producto2"]?>', '<?php echo $row["producto3"]?>',  '<?php echo $_SESSION['usuario'] ?>')">Añadir al carrito</button>
                        </ul>
                    <?php }
                }
            ?>
        </div>
    </div>

    <div class="bcolor2">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarOrdenesController.php">
            <button type="submit" class="ordernarbtn"> ¡Ordenar! </button>
            <div class="shopping-cart" id="carrito" required>
                <!-- SE AÑADEN LOS ITEMS -->
            </div>
        </form>
        <br><br><br><br>
    </div>

    <hr style="width:100%;text-align:left;margin-left:0">
        <div class="border">
            <h3 class="tmy"> *promociones validas de martes a jueves de 10.00 a 18.00 hrs. Solo consumo en sucursal; se aplican restricciones </h3>
        </div>
    <hr style="width:100%;text-align:left;margin-left:0">
        






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
                <h3 style="text-align: center;"> Añadir Promocion </h3>
                <!-- <h2 style="text-align: center;"> Bienvenido: <?php echo $_SESSION['usuario'] ?> </h2> -->
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
                                $productos = "SELECT * FROM productos";
                                $resultado = mysqli_query($connection, $productos); 
                                while($row=mysqli_fetch_assoc($resultado))
                                { ?>
                                    <option value="<?php echo $row["nombre"]?>" >
                            <?php } mysqli_free_result($resultado); ?>
                        </datalist> 

                        <input class="input-promo" type="text" name="producto2" list="productos">
                        <datalist id="productos">
                            <?php 
                                $productos = "SELECT * FROM productos";
                                $resultado = mysqli_query($connection, $productos); 
                                while($row=mysqli_fetch_assoc($resultado))
                                { ?>
                                    <option value="<?php echo $row["nombre"]?>" >
                            <?php } mysqli_free_result($resultado); ?>
                        </datalist> 

                        <input class="input-promo" type="text" name="producto3" list="productos">
                        <datalist id="productos">
                            <?php 
                                $productos = "SELECT * FROM productos";
                                $resultado = mysqli_query($connection, $productos); 
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
    <?php } ?>

    <!-- <ul class="ul-promo-generada">
        <h3> <?php echo $row["nombre"] ?> </h3>
        <li class="li-promo-generada"> <h6> <?php echo $row["producto1"] ?> </h6> </li>
        <li class="li-promo-generada"> <h6> <?php echo $row["producto2"] ?> </h6> </li>
        <li class="li-promo-generada"> <h6> <?php echo $row["producto3"] ?> </h6> </li>
        <li class="li-promo-generada"> <h6> <?php echo $row["precio"] ?> </h6> </li>
        <li class="li-promo-generada"> <img src="<?php echo $imageURL; ?>" class="img-promo-generada"> </li>
    </ul> -->

    <!-- <?php
        if(isset($_POST['eliminar']))
        {
            $id = $_POST['eliminar'];

            $sql = "DELETE FROM imagenes WHERE id = $id";

            if($connection->query($sql) === true){
                //echo "LOGRADO JEFE";
            }else {
                die("Error al actualizar datos: " . $connection->error);
            }
        }
    ?>
    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");
        
        $mensaje = "SELECT * FROM imagenes";

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        if(isset($_SESSION['rol'])){
            switch($_SESSION['rol']){
                case 1:
                    ?>
                    
                    <div>
                        <h3 style="text-align: center;"> Actualizar Promociones </h3>
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                    
                    <div class="container upload">
                        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarImagenController.php">
                            <h2>Subir archivo</h2>
                            <input type="file" name="file" multiple>
                            <button type="submit">Subir</button>
                        </form>
                    </div>
                    <div class="tabla-usuarios">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>Nombre del archivo</th>
                                <th>Fecha de subida</th>
                                <th>Status</th>
                                <th>Eliminar</th>
                            </tr>

                            <?php $resultado = mysqli_query($connection, $mensaje); 

                            while($row=mysqli_fetch_assoc($resultado))
                            { ?>
                                <tr>
                                    <td> <?php echo $row["id"] ?> </td>
                                    <td> <?php echo $row["file_name"]?> </td>
                                    <td> <?php echo $row["uploaded_on"]?> </td>
                                    <td> <?php if($row["status"] == 1) {
                                                    echo "En Linea";
                                                }
                                        ?> 
                                    </td>

                                    <td> 
                                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/php/promos.php">
                                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                                            <input type="submit" value="X"> 
                                        </form>
                                    </td>

                                </tr>
                            <?php } mysqli_free_result($resultado); ?>
                        </table>
                    </div> <?php
                    break;
                default:
            }
        }
    ?> -->

    
    <script src="/PROYECTO/Views/js/promos.js"></script>
</body>
</html>