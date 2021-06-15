<?php 

echo "ENTRO A AGREGAR ADMINISTRADOR CONTROLLER";

require_once("../Models/db.php");
require_once("../Models/Usuario.php");
require_once("../Models/Response.php");


try {
    $connection = DB::getConnection();
}
catch(PDOException $e) {
    echo "ERROR EN LA CONEXION DE BASE DE DATOS";

    error_log("Connection error - " . $e, 0);

    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->addMessage("Error de conexión a la BD");
    $response->send();

    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["password"];
    $rol = 1;

    $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :email, :contrasena, :rol)');
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
    $query->bindParam(':rol', $rol, PDO::PARAM_STR);
    $query->execute();
    
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        //header("Location: http://localhost/proyecto/Views/php/registrarse/?error=No se pudo registrar el usuario");
        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");


        exit();
    }

    //header("Location: http://localhost/proyecto/Views/php/registrarse/");
    header("Location: http://localhost/PROYECTO/Views/php/admin.php");
    exit();
}