<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/menu.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/carrito.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/promos.css">
    <title>Menu - El Panal</title>
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <meta name="robots" content="noindex,follow" />
</head>
<body>
    
    <?php include('header.php') ?>

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
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script type="text/javascript" src="/PROYECTO/Views/js/menu.js"></script>
</body>
</html>