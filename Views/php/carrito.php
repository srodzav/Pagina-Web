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
        <!-- Product #1 -->
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
                <span>White</span>
            </div>
            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="../images/plus.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="../images/minus.svg" alt="" />
                </button>
            </div>
            <div class="total-price">$20</div>
        </div>
        <!-- Product #2 -->
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
                <span>White</span>
            </div>
            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="../images/plus.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="../images/minus.svg" alt="" />
                </button>
            </div>
            <div class="total-price">$44</div>
        </div>
        <!-- Product #3 -->
        <div class="item">
            <div class="buttons">
                <span class="delete-btn"></span>
                <span class="like-btn"></span>
            </div>
            <div class="image">
                <img src="../images/comida/prueba.jpg" alt="" />
            </div>
            <div class="description">
                <span>Michelada</span>
                <span>XX Lager</span>
                <span>Brown</span>
            </div>
            <div class="quantity">
                <button class="plus-btn" type="button" name="button">
                    <img src="../images/plus.svg" alt="" />
                </button>
                <input type="text" name="name" value="1">
                <button class="minus-btn" type="button" name="button">
                    <img src="../images/minus.svg" alt="" />
                </button>
            </div>
            <div class="total-price">$39</div>
        </div>
    </div>

    <!-- <div class="shopping-cart">
       
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
    </div> -->
    <script src="/PROYECTO/Views/js/app.js"></script>
    <script src="/PROYECTO/Views/js/carrito.js"></script>
</body>
</html>