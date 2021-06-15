<?php 

echo "ENTRO A AGREGAR IMAGEN CONTROLLER";

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

                    $query = $connection->prepare('INSERT INTO imagenes VALUES(NULL, :file_name, NOW(), 1)');
                    $query->bindParam(':file_name', $file_name, PDO::PARAM_STR);
                    $query->execute();

                    $rowCount = $query->rowCount();

                    if ($rowCount == 0) {
                        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");
                        exit();
                    }
                    header("Location: http://localhost/PROYECTO/Views/php/promos.php");
                    exit();
                }
            } else {
                echo "Solo se admiten archivos jpg/jpeg/png";
            }
    } else {
        echo "Favor de seleccionar una imagen";
    }
}






// $statusMsg = '';
// $targetDir = "uploads/";

// if(isset($_POST['submit']) && $_FILES['file']['name'] != NULL){
//     $fileName = basename($_FILES['file']['name']);
//     $targetFilePath = $targetDir . $fileName;
//     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
//     if(in_array($fileType, $allowTypes)){
//         if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
//             $insert = $connection->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
//             if($insert){
//                 $statusMsg = "El archivo ".$fileName. " ha sido subido con extido.";
//             }else{
//                 $statusMsg = "El archivo no se subió, intente de nuevo.";
//             } 
//         }else{
//             $statusMsg = "Hubo un error al subir el archivo.";
//         }
//     }else{
//         $statusMsg = 'Solo se aceptan JPG, JPEG, PNG, GIF, & PDF.';
//     }
// }else{
//     $statusMsg = 'Selecciona un archivo para subir.';
// }

// echo $statusMsg;