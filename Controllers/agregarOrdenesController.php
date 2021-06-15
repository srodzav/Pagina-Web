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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < count($_POST['nombre']); $i++){
        $nombre = $_POST['nombre'][$i];
        $cantidad = $_POST['cantidad'][$i];
        $precio = $_POST['precio'][$i];

        $sql = 'INSERT INTO ordenes(nombre,cantidad,precio) VALUES(:nombre, :cantidad, :precio)';
        $query = $connection->prepare($sql);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $query->bindParam(':precio', $precio, PDO::PARAM_STR);
        $query->execute();
    }
    $rowCount = $query->rowCount();

    if ($rowCount == 0) {
        header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo hacer el pago");
        exit();
    }
    header("Location: http://localhost/PROYECTO/Views/php/compra.php");
    exit();
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
//     $nombre = $_POST["nombre"];
//     $cantidad = $_POST["cantidad"];
//     $precio = $_POST["precio"];

//     $query = $connection->prepare('INSERT INTO ordenes VALUES(NULL, :nombre, :cantidad, :precio)');
//     $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
//     $query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
//     $query->bindParam(':precio', $precio, PDO::PARAM_STR);
//     $query->execute();

//     $rowCount = $query->rowCount();

//     if ($rowCount == 0) {
//         header("Location: http://localhost/PROYECTO/index.php/?error=No se pudo registrar el usuario");
//         exit();
//     }
//     header("Location: http://localhost/PROYECTO/index.php");
//     exit();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $json_string = file_get_contents('php://input');
//     $json_obj = json_decode($json_string);
    
//     if ($json_obj->nombre == null || $json_obj->nombre == "") {
//         $response = new Response();
//         $response->setHttpStatusCode(400);
//         $response->addMessage("El nombre no puede ser null o estar vacío");
//         $response->send();
//         exit();
//     }
//     if ($json_obj->cantidad == null || $json_obj->cantidad == "") {
//         $response = new Response();
//         $response->setHttpStatusCode(400);
//         $response->addMessage("La cantidad no puede ser null o estar vacía");
//         $response->send();
//         exit();
//     }
//     $nombre = $json_obj->nombre;
//     $cantidad = $json_obj->cantidad;
//     $precio = $json_obj->precio;
//     try {
//         $query = $connection->prepare('INSERT INTO ordenes VALUES(NULL, :nombre, :cantidad, :precio)');
//         $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
//         $query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
//         $query->bindParam(':precio', $precio, PDO::PARAM_STR);
//         $query->execute();
//         $rowCount = $query->rowCount();
//         if ($rowCount == 0) {
//             $response = new Response();
//             $response->setHttpStatusCode(500);
//             $response->addMessage("Error al crear la orden");
//             $response->send();
//             exit();
//         }
//         $response = new Response();
//         $response->setHttpStatusCode(201);
//         $response->addMessage("Orden creada con éxito");
//         $response->send();
//         exit();
//     }
//     catch(PDOException $e) {
//         error_log("Query error - " . $e, 0);
//         $response = new Response();
//         $response->setHttpStatusCode(500);
//         $response->addMessage("Error al crear la tarea");
//         $response->send();
//         exit();
//     }
// }