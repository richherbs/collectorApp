<?php
    require 'includes/db.php';
    require 'includes/displayBikes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Collector</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Martel:200,300,400,600,700,800,900|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Bike Collector App</h1>
    <div class='card-container'>
        <?php  printCards($bikes);?>
    </div>
    <form class='add-form' method="get">
        <button class='button-add' type="submit">Add Bike</button>
    </form>
</body>
</html>