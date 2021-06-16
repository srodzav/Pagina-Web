<?php 

echo "ENTRO A AGREGAR PROMOCION CONTROLLER: \n";

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
    $nombre = $_POST["nombre"];
    $producto1 = $_POST["producto1"];
    $producto2 = $_POST["producto2"];
    $producto3 = $_POST["producto3"];
    $precio = $_POST["precio"];

    $directorio = "uploads/";
    $archivo = $directorio . basename($_FILES["file"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

    if ($checarSiImagen != false) {
        $size = $_FILES["file"]["size"];
        if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                $imagen = basename($_FILES["file"]["name"]);

                $query = $connection->prepare('INSERT INTO promociones VALUES(NULL, :nombre, :producto1, :producto2, :producto3, :precio, :imagen)');
                $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $query->bindParam(':producto1', $producto1, PDO::PARAM_STR);
                $query->bindParam(':producto2', $producto2, PDO::PARAM_STR);
                $query->bindParam(':producto3', $producto3, PDO::PARAM_STR);
                $query->bindParam(':precio', $precio, PDO::PARAM_STR);
                $query->bindParam(':imagen', $imagen, PDO::PARAM_STR);

                echo $nombre . ", " . $producto1 . ", " . $producto2 . ", " . $producto3 . ", " . $precio . ", " . $imagen;
                
                $query->execute();
            }
        }
    }
    
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");


        exit();
    }

    header("Location: http://localhost/PROYECTO/Views/php/promos.php");
    exit();
}