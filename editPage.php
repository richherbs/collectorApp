<?php
    require 'includes/header.php';
    require 'includes/db.php';
    require 'includes/populateSelectors.php';
    require 'includes/editBike.php';
?>
<body>
    <h1>Edit a Bike</h1>
    <form class='add-bike-form' method="post" enctype="multipart/form-data">
        <label for="brand">Make</label>
        <select name="brand">
            <?php
                $makes = selectorQuery($db, 'brand_name', 'brand');
                echo populateSelector($makes, $theBike[0]['brand_name']);
            ?>
        </select>
        <label for="model">Model</label>
        <input type="text" name="model" value="<?php echo $theBike[0]['model']?>">
        <label for="discipline">Discipline</label>
        <select name="discipline">
            <?php
                $disciplines = selectorQuery($db, 'discipline_name', 'discipline');
                echo populateSelector($disciplines, $theBike[0]['discipline_name']);
            ?>
        </select>
        <label for="wheelsize">Wheel Size</label>
        <select name="wheelsize">
            <?php
                $wheelsize = selectorQuery($db, 'wheel_diameter', 'wheelSize');
                echo populateSelector($wheelsize, $theBike[0]['wheel_diameter']);
            ?>
        </select>
        <button type="submit" name="updateBike">Edit Bike</button>
    </form>
</body>
</html>