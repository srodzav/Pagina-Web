<?php 

echo "ENTRO A AGREGAR USUARIOS CONTROLLER";

require_once("../Models/db.php");
require_once("../Models/Usuario.php");
require_once("../Models/Response.php");


try {
    $connection = DB::getConnection();
}
catch(PDOException $e) {
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

    $query = $connection->prepare('INSERT INTO usuarios VALUES(NULL, :email, :contrasena)');
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
    $query->execute();
    
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        //header("Location: http://localhost/proyecto/Views/php/registrarse/?error=No se pudo registrar el usuario");
        header("Location: http://localhost/proyecto/index.php/?error=No se pudo registrar el usuario");


        exit();
    }

    //header("Location: http://localhost/proyecto/Views/php/registrarse/");
    header("Location: http://localhost/proyecto/index.php");
    exit();
}