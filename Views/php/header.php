<?php
    $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
    mysqli_set_charset($connection, "utf8");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_SESSION['usuario'])){
        $varsesion = $_SESSION['usuario'];
    }
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/PROYECTO/Views/css/style_admin.css">
<link rel="stylesheet" href="/PROYECTO/Views/css/style.css">

<div class="navbar flex" id="responsive-pc">
    <div class="w-25">
        <img src="/PROYECTO/Views/images/comida/logo.jpg" width="100px">
    </div>
    <div class="w-50 center">
        <a href="/PROYECTO/index.php">Inicio</a>
        <a href="/PROYECTO/Views/php/menu.php">Menu</a>
        <a href="/PROYECTO/Views/php/promos.php">Promos</a>
        <a href="/PROYECTO/Views/php/galeria.php">Galeria</a>
        <a href="/PROYECTO/Views/php/contacto.php">Contacto</a>
    </div>
        <?php 
        if(isset($_SESSION['usuario']) == NULL) { ?>
            <div class="w-25 dropdown center">
                <a href="/PROYECTO/Views/php/login.php">Iniciar Sesion</a>
                <a href="/PROYECTO/Views/php/registrarse.php">Registrarse</a>
            </div>
        <?php } else if (isset($_SESSION['usuario']) && ($_SESSION['rol'] == 1)) { ?>
            <div class="w-25 dropdown center">
                <button class="dropbtn" onclick="Drop()"> 
                    <a class="user" style="text-aling:right"> <img width="40px" height="40px" src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?> </a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="Drop">
                    <a href="/PROYECTO/Views/cli/admin_index.php">Panel de Administrador</a>
                    <a href="/PROYECTO/Views/php/mispedidos.php">Mis Pedidos</a>
                    <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
                </div>
            </div>
        <?php } else if (isset($_SESSION)) { ?>
            <div class="w-25 dropdown center">
                <button class="dropbtn" onclick="Drop()"> 
                    <a class="user" style="text-aling:right"> <img width="40px" height="40px" src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?> </a>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="Drop">
                    <a href="/PROYECTO/Views/php/mispedidos.php">Mis Pedidos</a>
                    <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
                </div>
            </div>
        <?php } else { ?>
            
        <?php } ?>
    </div>
</div>

<div class="navbar" style="text-align:center" id="responsive-mobile">
    <div class="dropdown  w-75">
        <button class="dropbtn" onclick="Drop2()"> 
            Menú <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="Drop2">
            <a href="/PROYECTO/index.php">Inicio</a>
            <a href="/PROYECTO/Views/php/menu.php">Menu</a>
            <a href="/PROYECTO/Views/php/promos.php">Promos</a>
            <a href="/PROYECTO/Views/php/galeria.php">Galeria</a>
            <a href="/PROYECTO/Views/php/contacto.php">Contacto</a>
        </div>
    </div>
        <?php if(isset($_SESSION['usuario']) == NULL) { ?>
            <div class="dropdown center w-25">
                <button class="dropbtn" onclick="Down()"> 
                    Sesión <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="Down">
                    <a href="/PROYECTO/Views/php/login.php">Iniciar Sesion</a>
                    <a href="/PROYECTO/Views/php/registrarse.php">Registrarse</a>
                </div>
            </div>
        <?php } else if (isset($_SESSION['usuario']) && ($_SESSION['rol'] == 1)) { ?>
            <div class="w-25 dropdown center">
                <button class="dropbtn" onclick="Down()"> 
                    <img width="24px" height="24px"  src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="Down">
                    <a href="/PROYECTO/Views/cli/admin_index.php">Panel de Administrador</a>
                    <a href="/PROYECTO/Views/php/mispedidos.php">Mis Pedidos</a>
                    <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
                </div>
            </div>
        <?php } else if (isset($_SESSION)) { ?>
            <div class="w-25 dropdown center">
                <button class="dropbtn" onclick="Down()"> 
                    <img width="24px" height="24px"  src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="Down">
                    <a href="/PROYECTO/Views/php/mispedidos.php">Mis Pedidos</a>
                    <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
                </div>
            </div>
        <?php } else { ?>
            
        <?php } ?>
</div>

<script>
    function Drop() {
        document.getElementById("Drop").classList.toggle("show");
    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("Drop");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    function Down() {
        console.log("DOWN DOWN DOWN");
        document.getElementById("Down").classList.toggle("show");
        console.log(document.getElementById("Drop"));
    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("Down");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    function Drop2() {
        document.getElementById("Drop2").classList.toggle("show");
    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("Drop");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>