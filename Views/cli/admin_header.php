<?php $varsesion = $_SESSION['usuario']; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/PROYECTO/Views/css/style_admin.css">

<div class="navbar flex" id="responsive-pc">
    <div class="w-25">
        <img src="/PROYECTO/Views/images/comida/logo.jpg" width="100px">
    </div>
    <div class="w-50 center">
        <a href="/PROYECTO/Views/cli/admin_index.php">Inicio</a>
        <a href="/PROYECTO/Views/cli/admin_menu.php">Panel de Menu</a>
        <a href="/PROYECTO/Views/cli/admin_promos.php">Panel de Promos</a>
        <a href="/PROYECTO/Views/cli/admin_galeria.php">Panel de Galeria</a>
        <a href="/PROYECTO/Views/cli/admin_contacto.php">Panel de Contacto</a>
    </div>
    <div class="w-25 dropdown center">
        <button class="dropbtn" onclick="Drop()"> 
            <?php 
            if(!($varsesion == NULL || $varsesion == '')) { ?>
                <a class="user" style="text-aling:right"> <img width="40px" height="40px" src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?> </a>
                <?php 
            } ?> <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="Drop">
            <a href="/PROYECTO/index.php">Regresar a tienda</a>
            <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
        </div>
    </div>
</div>

<div class="navbar" style="text-align:center" id="responsive-mobile">
    <div class="dropdown  w-75">
        <button class="dropbtn" onclick="Down()"> 
            Menú <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="Down">
            <a href="/PROYECTO/Views/cli/admin_index.php">Inicio</a>
            <a href="/PROYECTO/Views/cli/admin_menu.php">Panel de Menu</a>
            <a href="/PROYECTO/Views/cli/admin_promos.php">Panel de Promos</a>
            <a href="/PROYECTO/Views/cli/admin_galeria.php">Panel de Galeria</a>
            <a href="/PROYECTO/Views/cli/admin_contacto.php">Panel de Contacto</a>
        </div>
    </div>
    <div class="dropdown w-25">
        <button class="dropbtn" onclick="Drop2()"> 
            <?php 
            if(!($varsesion == NULL || $varsesion == '')) { ?>
                <img width="24px" height="24px" src="/PROYECTO/Views/images/user.png"> <?php echo $_SESSION['usuario'] ?>
                <?php } ?> <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="Drop2">
            <a href="/PROYECTO/index.php">Regresar a tienda</a>
            <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a>
        </div>
    </div>
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
        document.getElementById("Down").classList.toggle("show");
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
        var myDropdown = document.getElementById("Drop2");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>