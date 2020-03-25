<?php
    require 'includes/header.php';
    require 'includes/db.php';
    require 'includes/displayBikes.php';
?>

<body>
    <h1>Bike Collector App</h1>
    <div class='card-container'>
        <?php  
            $bikes = getBikesFromDB($db);
            echo printCards($bikes);
        ?>
    </div>
    <form class='add-form' method="get">
        <button class='button-add' ><a href="addBike.php">Add Bike</a></button>
    </form>
</body>
</html>