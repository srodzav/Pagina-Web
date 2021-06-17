<?php 

echo "ENTRO A AGREGAR PRODUCTO CONTROLLER \n";

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
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];

    $directorio = "uploads/";
    $archivo = $directorio . basename($_FILES["file"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

    if ($checarSiImagen != false) {
        $size = $_FILES["file"]["size"];
        if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                $file_name = basename($_FILES["file"]["name"]);

                $query = $connection->prepare('INSERT INTO productos VALUES(NULL, :nombre, :descripcion, :precio, :imagen)');
                $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $query->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $query->bindParam(':precio', $precio, PDO::PARAM_STR);
                $query->bindParam(':imagen', $file_name, PDO::PARAM_STR);
                $query->execute();
            }
        }
    }
    
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");


        exit();
    }

    header("Location: http://localhost/PROYECTO/Views/php/menu.php");
    exit();
}