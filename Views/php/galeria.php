<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script src="/PROYECTO/Views/js/galeria.js"></script>
</body>
</html>