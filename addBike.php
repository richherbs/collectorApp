<?php
    require 'includes/header.php';
?>

<body>
    <h1>Add a Bike</h1>
    <form class='add-bike-form' method="post" enctype="multipart/form-data">
        <label for="make">Make</label>
        <select class='add-edit-input' name="brand">
            <?php
                $makes = selectorQuery($db, 'brand_name', 'brand');
                echo populateSelector($makes, '');
            ?>
        </select>
        <label for="model">Model</label>
        <input class='add-edit-input' type="text" name="model">
        <label for="discipline">Discipline</label>
        <select class='add-edit-input' name="discipline">
            <?php
                $disciplines = selectorQuery($db, 'discipline_name', 'discipline');
                echo populateSelector($disciplines, '');
            ?>
        </select>
        <label for="wheelsize">Wheel Size</label>
        <select class='add-edit-input' name="wheelsize">
            <?php
                $wheelsize = selectorQuery($db, 'wheel_diameter', 'wheelSize');
                echo populateSelector($wheelsize, '');
            ?>
            </select>
        <label for="pic">Picture</label>
        <input class='add-edit-input' type="file" name="pic">
        <button type="submit" name="submitAdd">Add Bike</button>
    </form>
</body>
</html>