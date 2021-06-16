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
                            <button class="boton-carrito" onClick="addCarrito('<?php echo $row["nombre"]?>', <?php echo $row["precio"]?>, '<?php echo $row["imagen"]?>', '<?php echo $row["descripcion"]?>')">Añadir al carrito</button>
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
    
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script type="text/javascript" src="/PROYECTO/Views/js/menu.js"></script>
</body>
</html>

<!-- 
<div class="single_menu bcolor3">
    <div class="menu_content">
        <h4>Tortas Ahogadas <span>$55.00 c/u</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, animi dolorum suscipit consequuntur reiciendis mollitia veritatis consectetur quae quia, quod sed corporis sapiente ex ipsam impedit dolor quis modi non!</p>
        <img src="../images/comida/Torta.jpg">
        <br>
        <button class="boton-carrito" onClick="addCarrito(1)">Añadir al carrito</button>
    </div>
</div>
<div class="single_menu bcolor3">
    <div class="menu_content">
        <h4>Tacos <span>$20.00 c/u</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt aliquam alias culpa aliquid mollitia vero autem quia aspernatur? Ipsam tenetur, cumque omnis facilis excepturi magnam optio ipsum corporis itaque laudantium.</p>
        <img src="../images/comida/Taco_Marco.jpg">
        <br>
        <button class="boton-carrito" onClick="addCarrito(2)">Añadir al carrito</button>
    </div>
</div>
<div class="single_menu bcolor3">
    <div class="menu_content">
        <h4>Tacos Dorados  <span>$40.00 (5 pz)</span></h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sit velit laborum doloremque adipisci? Corporis tempora, ipsum saepe placeat esse repudiandae est error porro ipsam recusandae nesciunt culpa ex doloribus!</p>
        <img src="../images/comida/Tacos.jpg">
        <br>
        <button class="boton-carrito" onClick="addCarrito(3)">Añadir al carrito</button>
    </div>
</div>
<div class="single_menu bcolor3">
    <div class="menu_content">
        <h4>Gorditas  <span>$30.00 c/u</span></h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem eos exercitationem quaerat nostrum ab eius quam quas accusantium sequi? Aspernatur, repellendus? Tempore accusamus quas id repudiandae, sint atque asperiores facere?</p>
        <img src="../images/comida/Torta1.jpg">
        <br>
        <button class="boton-carrito" onClick="addCarrito(4)">Añadir al carrito</button>
    </div>
</div>
<div class="single_menu bcolor3">
    <div class="menu_content">
        <h4>Michelada  <span>$39.00 c/u</span></h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem eos exercitationem quaerat nostrum ab eius quam quas accusantium sequi? Aspernatur, repellendus? Tempore accusamus quas id repudiandae, sint atque asperiores facere?</p>
        <img src="../images/comida/Michelada_Marco.jpg">
        <br>
        <button class="boton-carrito" onClick="addCarrito(5)">Añadir al carrito</button>
    </div>
</div> -->