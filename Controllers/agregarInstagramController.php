<?php 

echo "ENTRO A AGREGAR INSTRAGRAM CONTROLLER \n";

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
    //var_dump($_FILES["file"]);

    $directorio = "uploads/";
    $archivo = $directorio . basename($_FILES["file"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

    $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

    if ($checarSiImagen != false) {
        $size = $_FILES["file"]["size"];
            if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                    $file_name = basename($_FILES["file"]["name"]);
                    $rand1 = rand(500,800);
                    $rand2 = rand(900,1200);

                    $query = $connection->prepare('INSERT INTO instagram VALUES(NULL, :file_name, NOW(), :comments, :likes)');
                    $query->bindParam(':file_name', $file_name, PDO::PARAM_STR);
                    $query->bindParam(':comments', $rand1, PDO::PARAM_STR);
                    $query->bindParam(':likes', $rand2, PDO::PARAM_STR);
                    $query->execute();

                    $rowCount = $query->rowCount();

                    if ($rowCount == 0) {
                        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");
                        exit();
                    }
                    header("Location: http://localhost/PROYECTO/Views/cli/admin_galeria.php");
                    exit();
                }
            } else {
                echo "Solo se admiten archivos jpg/jpeg/png";
            }
    } else {
        echo "Favor de seleccionar una imagen";
    }
}