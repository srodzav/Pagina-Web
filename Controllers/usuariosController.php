<?php 

echo "ENTRO A USUARIOS CONTROLLER";

require_once("/PROYECTO/Models/db.php");
require_once("/PROYECTO/Models/Usuario.php");
require_once("/PROYECTO/Models/Response.php");

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
    $json_string = file_get_contents('php://input');
    $json_obj = json_decode($json_string);

    //var_dump($json_obj);
    
    if ($json_obj->email == null || $json_obj->email == "") {
        
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->addMessage("El email de usuario no puede ser null o estar vacío");
        $response->send();

        exit();
    }

    if ($json_obj->contasena == null || $json_obj->contasena == "") {
        
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->addMessage("La contraseña no puede ser null o estar vacía");
        $response->send();

        exit();
    }

    $email = $json_obj->email;
    $contasena = $json_obj->contasena . "";
    
    try {
        $query = $connection->prepare('SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena');
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contrasena', $contasena, PDO::PARAM_STR);
        $query->execute();
    
        $rowCount = $query->rowCount();

        if ($rowCount == 0) {
            $response = new Response();
            $response->setHttpStatusCode(500);
            $response->addMessage("El correo de usuario o la contraseña son incorrectos");
            $response->send();

            exit();
        }

        $usuario;

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $usuario_aux = new Usuario($row["id"], $row["email"]);

            $usuario[] = $usuario_aux->returnArray();
        }

        session_start();

        $_SESSION["id"] = $usuario_aux->getId();
        $_SESSION["email"] = $usuario_aux->getNombreUsuario();

        $response = new Response();
        $response->setHttpStatusCode(200);
        $response->setData($usuario);
        $response->send();

        echo("PUES TODO JALÓ");

        exit();
    }
    catch(PDOException $e) {
        error_log("Query error - " . $e, 0);

        $response = new Response();
        $response->setHttpStatusCode(500);
        $response->addMessage("Error al iniciar sesión");
        $response->send();

        exit();
    }
}

?>