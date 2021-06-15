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
</head>
<body>
    
    <?php include('header.php') ?>
    
    <div>
        <h1 style="text-align: center;"> Menú </h1>
    </div>
    
    <hr style="width:100%;text-align:left;margin-left:0">
    <div class="flex">
        <div class="w-50">
            <section id="our_menu" class="bcolor2">
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
            </section>
        </div>
        <div class="w-50">
            <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarOrdenesController.php">
                <button type="submit" class="ordernarbtn">¡Ordenar!</button>
                <div class="shopping-cart" id="carrito">
                    <!-- SE AÑADEN LOS ITEMS -->
                </div>
            </form>
        </div>
    </div>
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script src="/PROYECTO/Views/js/menu.js"></script>
    <?php



    ?>
</body>
</html>