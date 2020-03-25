<?php
    require 'includes/header.php';
    require 'includes/db.php';
    require 'includes/populateSelectors.php';
    require 'includes/editBike.php';
?>
<body>
    <h1>Edit a Bike</h1>
    <form class='add-bike-form' method="post" enctype="multipart/form-data">
        <label for="make">Make</label>
        <select name="brand">
            <?php
                $makes = selectorQuery($db, 'brand_name', 'brand');
                echo populateSelector($makes);
            ?>
        </select>
        <label for="model">Model</label>
        <input type="text" name="model">
        <label for="discipline">Discipline</label>
        <select name="discipline">
            <?php
                $disciplines = selectorQuery($db, 'discipline_name', 'discipline');
                echo populateSelector($disciplines);
            ?>
        </select>
        <label for="wheelsize">Wheel Size</label>
        <select name="wheelsize">
            <?php
                $wheelsize = selectorQuery($db, 'wheel_diameter', 'wheelSize');
                echo populateSelector($wheelsize);
            ?>
        <button type="submit" name="updateBike">Add Bike</button>
    </form>
</body>
</html>