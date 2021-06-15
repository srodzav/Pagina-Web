<?php 

echo "ENTRO A AGREGAR COMENTARIO CONTROLLER";

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
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $query = $connection->prepare('INSERT INTO mensaje VALUES(NULL, :firstname, :email, :message)');
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
    
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        //header("Location: http://localhost/proyecto/Views/php/registrarse/?error=No se pudo registrar el usuario");
        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");


        exit();
    }

    //header("Location: http://localhost/proyecto/Views/php/registrarse/");
    header("Location: http://localhost/PROYECTO/index.php");
    exit();
}