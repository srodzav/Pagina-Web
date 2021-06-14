<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/carrito.css">
    <title>Carrito - El Panal</title>
</head>
<body>
   
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Carrito </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="shopping-cart">
       
        <!-- #1 -->
        <div class="item">
            <div class="image">
                <img src="/PROYECTO/Views/images/comida/Tacos.jpg" width="100"/>
            </div>
            <div class="description">
                <span>Orden de Tacos</span>
                <span>Lorem</span>
            </div>
            <div class="total-price">$20</div>
        </div>
        <!-- #2 -->
        <div class="item">
            <div class="image">
                <img src="/PROYECTO/Views/images/comida/Torta_Marco.jpg" width="100"/>
            </div>
            <div class="description">
                <span>Torta</span>
                <span>Lorem </span>
            </div>
            <div class="total-price">$55</div>
        </div>
        <!-- #3 -->
        <div class="item">
            <div class="image">
                <img src="/PROYECTO/Views/images/comida/Michelada_Marco.jpg" width="100"/>
            </div>
            <div class="description">
                <span>Michelada</span>
                <span>Lorem</span>
            </div>
            <div class="total-price">$40</div>
        </div>
        <!-- #4 -->
        <div class="item">
            <div class="image">
                <img src="/PROYECTO/Views/images/comida/Taco_Marco.jpg" width="100"/>
            </div>
            <div class="description">
                <span>Taco</span>
                <span>Lorem</span>
            </div>
            <div class="total-price">$40</div>
        </div>
    </div>
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script src="/PROYECTO/Views/js/carrito.js"></script>
</body>
</html>