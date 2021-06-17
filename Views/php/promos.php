<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script src="/PROYECTO/Views/js/promos.js"></script>
</body>
</html>