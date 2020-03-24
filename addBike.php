<?php
    require 'includes/db.php';
    require 'includes/header.php';
    require 'includes/fileUpload.php';
    require 'includes/populateSelectors.php';
?>

<body>
    <h1>Bike Collector App</h1>
    <form class='add-bike-form' method="post" enctype="multipart/form-data">
        <label for="make">Make</label>
        <select name="brand">
            <?php
                $query = $db->prepare("SELECT id, brand_name as name FROM brand");
                $query->execute();
                $makes = $query->fetchAll();
                populateSelector($makes);
            ?>
        </select>
        <label for="model">Model</label>
        <input type="text" name="model">
        <label for="discipline">Discipline</label>
        <select name="discipline">
            <?php
                $query = $db->prepare("SELECT id, discipline_name as name FROM discipline");
                $query->execute();
                $disciplines = $query->fetchAll();
                populateSelector($disciplines);
            ?>
        </select>
        <label for="wheelsize">Wheel Size</label>
        <select name="wheelsize">
            <?php
                $query = $db->prepare("SELECT id, wheel_diameter as name FROM wheelSize");
                $query->execute();
                $wheelsize = $query->fetchAll();
                populateSelector($wheelsize);
            ?>
        <label for="pic">Picture</label>
        <input type="file" name="pic">
        <button class='' type="submit" name="submit">Add Bike</button>
    </form>
</body>
</html>