<?php 

echo "ENTRO A AGREGAR ORDENES CONTROLLER";

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

$ordenes = "SELECT * FROM ordenes";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //while(){
        $nombre = $_POST["nombre"];
        $cantidad = $_POST["cantidad"];

        $query = $connection->prepare('INSERT INTO ordenes VALUES(NULL, :nombre, :cantidad)');
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $query->execute();

        $rowCount = $query->rowCount();

        if ($rowCount == 0) {
            header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");
            exit();
        }
    //}
    header("Location: http://localhost/PROYECTO/index.php");
    exit();
}