<?php $instagram = "SELECT * FROM instagram"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/PROYECTO/Views/css/style.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/galeria.css">
    <link rel="stylesheet" href="/PROYECTO/Views/css/admin.css">
    <title>Galeria - El Panal</title>
</head>
<body>
    
    <?php include('header.php') ?>

    <div>
        <h1 style="text-align: center;"> Galeria </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">

    <div class="header" id="myHeader">
        <button class="btn" onclick="one()">1</button>
        <button class="btn active" onclick="two()">2</button>
        <button class="btn" onclick="four()">4</button>
    </div>
      
    <!-- VER IMAGENES -->
    <div class="row"> 
        <div class="column">
            <?php
                $query = $connection->query("SELECT * FROM instagram ORDER BY uploaded_on DESC");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = '/PROYECTO/Controllers/uploads/'.$row["usuario"]; ?>
                        <img src="<?php echo $imageURL; ?>" style="width:100%">
                    <?php }
                }
            ?>
        </div>
        <div class="column">
            <?php
                $query = $connection->query("SELECT * FROM instagram ORDER BY uploaded_on DESC");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = '/PROYECTO/Controllers/uploads/'.$row["usuario"]; ?>
                        <img src="<?php echo $imageURL; ?>" style="width:100%">
                    <?php }
                }
            ?>
        </div>
        <div class="column">
            <?php
                $query = $connection->query("SELECT * FROM instagram ORDER BY uploaded_on DESC");
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = '/PROYECTO/Controllers/uploads/'.$row["usuario"]; ?>
                        <img src="<?php echo $imageURL; ?>" style="width:100%">
                    <?php }
                }
            ?>
        </div>
    </div>

    <br><br><br><br>
    <?php
        $connection = mysqli_connect('localhost', 'root', 'qwert', 'panal_db');
        mysqli_set_charset($connection, "utf8");

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        if(!isset($_SESSION['rol'])){
        }else{
            if($_SESSION['rol'] == 1){
                ?>
    <div>
        <h1 style="text-align: center;"> Panel de Administración Instagram </h1>
    </div>
    <hr style="width:100%;text-align:left;margin-left:0">
    <br>

    <div class="container upload">
        <form method="POST" enctype="multipart/form-data" action="/PROYECTO/Controllers/agregarInstagramController.php">
            <h2>Subir Foto</h2>
            <input type="file" name="file" multiple>
            <button type="submit">Subir</button>
        </form>
    </div>
    <div class="tabla-usuarios">
        <table>
            <tr>
                <th>id</th>
                <th>@usuario</th>
                <th>Fecha de subida</th>
                <th>Comentarios</th>
                <th>Interacciones</th>
            </tr>

            <?php $resultado = mysqli_query($connection, $instagram); 

            while($row=mysqli_fetch_assoc($resultado))
            { ?>
                <tr>
                    <td> <?php echo $row["id"] ?> </td>
                    <td> 
                        <?php 
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $randomString = '';
                            for ($i = 0; $i < 10; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            echo $randomString;
                        ?> 
                    </td>
                    <td> <?php echo $row["uploaded_on"]?> </td>
                    <td> <?php echo $row["comments"] ?> </td>
                    <td> <?php echo $row["likes"] ?> </td>
                </tr>
            <?php } mysqli_free_result($resultado); ?>
        </table>
    </div> <?php
            }
        }
    ?>

    <script src="/PROYECTO/Views/js/galeria.js"></script>
</body>
</html>