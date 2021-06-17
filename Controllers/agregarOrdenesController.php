<?php 

echo "ENTRO A AGREGAR ORDENES CONTROLLER \n";

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
        $usuario = $_POST['usuario'][$i];

        $sql = 'INSERT INTO ordenes(nombre,cantidad,precio,usuario) VALUES(:nombre, :cantidad, :precio, :usuario)';
        $query = $connection->prepare($sql);
        $query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $query->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $query->bindParam(':precio', $precio, PDO::PARAM_STR);
        $query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
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