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

    <div class="shopping-cart" id="s_cart">

    </div>

    <!-- <div class="shopping-cart">
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>
            <div class="image">
                <img src="../images/comida/prueba.jpg" alt="" />
            </div>
            <div class="description">
                <span>Orden de Tacos</span>
                <span>5 tacos</span>
            </div>
            <div class="quantity">
                <span>Cantidad</span>
                <input type="text" name="name" value="1">
            </div>
            <div class="total-price">$40</div>
        </div>
        
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>
            <div class="image">
                <img src="../images/comida/prueba.jpg" alt=""/>
            </div>
            <div class="description">
                <span>Torta</span>
                <span>Torta de maciza</span>
            </div>
            <div class="quantity">
                <span>Cantidad</span>
                <input type="text" name="name" value="1">
            </div>
            <div class="total-price">$55</div>
        </div>
        
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>
            <div class="image">
                <img src="../images/comida/prueba.jpg" alt="" />
            </div>
            <div class="description">
                <span>Gordita</span>
                <span>Gordita de Maciza</span>
            </div>
            <div class="quantity">
                <span>Cantidad</span>
                <input type="text" name="name" value="1">
            </div>
            <div class="total-price">$30</div>
        </div>
    </div> -->

    <!-- <script type="text/javascript">
        var minus = document.getElementById("minus-btn");
        var plus = document.getElementById("plus-btn");

        minus.on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
            if (value > 1) {
                value = value - 1;
            } else {
                value = 0;
            }
            $input.val(value);
        });

        plus.on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
            if (value < 100) {
                value = value + 1;
            } else {
                value =100;
            }
            $input.val(value);
        });

        $('.like-btn').on('click', function() {
            $(this).toggleClass('is-active');
        });
    </script> -->
</body>
</html>