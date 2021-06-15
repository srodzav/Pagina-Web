<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/promos.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Promos - El Panal</title>
</head>
<body>
   
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Promos </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="flex bcolor2">
        <div class="flex border justify-space w-100">
            <ul class="ul-promo">
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo1.jpg" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo2.jpg" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo3.PNG" class="img-promo"></li>
                <li class="li-promo"><img src="/PROYECTO/Views/images/comida/Promo4.PNG" class="img-promo"></li>
                <?php
                    $query = $connection->query("SELECT * FROM imagenes ORDER BY uploaded_on DESC");
                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                            $imageURL = '/PROYECTO/Controllers/uploads/'.$row["file_name"]; ?>
                            <li><img src="<?php echo $imageURL; ?>" class="img-promo"></li>
                        <?php }
                    }
                ?>
            </ul>
        </div>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
        <div class="border">
            <h3 class="tmy"> *promociones validas de martes a jueves de 10.00 a 18.00 hrs. Solo consumo en sucursal; se aplican restricciones </h3>
        </div>
    <hr style="width:100%;text-align:left;margin-left:0">
        
    <?php
        if(isset($_POST['eliminar']))
        {
            $id = $_POST['eliminar'];

            $sql = "DELETE FROM imagenes WHERE id = $id";

            if($connection->query($sql) === true){
                //echo "LOGRADO JEFE";
            }else {
                die("Error al actualizar datos: " . $connection->error);
            }
        }
    ?>
    
    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");
        
        $mensaje = "SELECT * FROM imagenes";

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        if(isset($_SESSION['rol'])){
            switch($_SESSION['rol']){
                case 1:
                    ?>
                    
                    <div>
                        <h3 style="text-align: center;"> Actualizar Promociones </h3>
                    </div>
                    <hr style="width:100%;text-align:left;margin-left:0">
                    
                    <div class="container upload">
                        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarImagenController.php">
                            <h2>Subir archivo</h2>
                            <input type="file" name="file" multiple>
                            <button type="submit">Subir</button>
                        </form>
                    </div>
                    <div class="tabla-usuarios">
                        <table>
                            <tr>
                                <th>id</th>
                                <th>Nombre del archivo</th>
                                <th>Fecha de subida</th>
                                <th>Status</th>
                                <th>Eliminar</th>
                            </tr>

                            <?php $resultado = mysqli_query($connection, $mensaje); 

                            while($row=mysqli_fetch_assoc($resultado))
                            { ?>
                                <tr>
                                    <td> <?php echo $row["id"] ?> </td>
                                    <td> <?php echo $row["file_name"]?> </td>
                                    <td> <?php echo $row["uploaded_on"]?> </td>
                                    <td> <?php if($row["status"] == 1) {
                                                    echo "En Linea";
                                                }
                                        ?> 
                                    </td>

                                    <td> 
                                        <form method="POST" id="form_eliminar_<?php echo $row['id']; ?>" action="/PROYECTO/Views/php/promos.php">
                                            <input type="hidden" name="eliminar" value="<?php echo $row['id']; ?> "> 
                                            <input type="submit" value="X"> 
                                        </form>
                                    </td>

                                </tr>
                            <?php } mysqli_free_result($resultado); ?>
                        </table>
                    </div> <?php
                    break;
                default:
            }
        }
    ?>
</body>
</html>