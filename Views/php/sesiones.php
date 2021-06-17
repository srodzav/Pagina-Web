<?php
    include('../../Models/db.php');
    
    session_start();
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $_SESSION['usuario'] = $email;
    $_SESSION['password'] = $password;

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $contrasena = $_POST['password'];

        $db = new DB();
        $query = $db->getConnection()->prepare('SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena');
        $query->execute(['email' => $email, 'contrasena' => $contrasena]);

        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            $rol = $row[3];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('location: /PROYECTO/Views/php/admin.php');
                    break;
                case 2:
                    header('location: /PROYECTO/index.php');
                    break;
                default:
            }
        } else {
            echo
                '<script>
                alert("Usuario o contraseña incorrecto");
                </script>';
        }
    }
?>