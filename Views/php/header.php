<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div class="w-40 center">
        <a href="/PROYECTO/Views/php/login.php">Iniciar Sesion</a>
        <a href="/PROYECTO/Views/php/registrarse.php">Registrarse</a>
        <?php
            $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
            mysqli_set_charset($connection, "utf8");
            $usuarios = "SELECT * FROM usuarios";
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
            if(isset($_SESSION['rol'])){
                ?> <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a> <?php
            }
        ?>
    </div>
</div>

<div class="navbar" style="text-align:center" id="responsive-mobile">
    <div class="dropdown border w-75">
        <button class="dropbtn" onclick="myFunction()"> 
            Menú <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="myDropdown">
            <a href="/PROYECTO/index.php">Inicio</a>
            <a href="/PROYECTO/Views/php/menu.php">Menu</a>
            <a href="/PROYECTO/Views/php/promos.php">Promos</a>
            <a href="/PROYECTO/Views/php/galeria.php">Galeria</a>
            <a href="/PROYECTO/Views/php/contacto.php">Contacto</a>
        </div>
    </div>
    <div class="dropdown border w-25">
        <button class="dropbtn" onclick="myFunction1()"> 
            Sesión <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="myDropdown1">
            <a href="/PROYECTO/Views/php/login.php">Iniciar Sesion</a>
            <a href="/PROYECTO/Views/php/registrarse.php">Registrarse</a>
            <?php
                $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
                mysqli_set_charset($connection, "utf8");
                $usuarios = "SELECT * FROM usuarios";
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                if(isset($_SESSION['rol'])){
                    ?> <a href="/PROYECTO/Views/php/login.php?cerrar_sesion">Cerrar Sesion</a> <?php
                }
            ?>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    function myFunction1() {
        document.getElementById("myDropdown1").classList.toggle("show");
    }
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown1");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
</script>