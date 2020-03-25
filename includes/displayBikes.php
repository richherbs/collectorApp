<?php
if(!defined('SAFETORUN')){
    echo 'You can\'t run this file on its own.';
    die;
}

/**
 * take in a db connection and return card html objects with the information from the bikes table in them
 *
 * @param PDO $aDB - a db connection
 * @return void
 */
function printCards (PDO $aDB){

    // prepare
    $query = $aDB->prepare("SELECT brand.brand_name, bikes.model, discipline.discipline_name, wheelSize.wheel_diameter, bikes.pic_url
                            FROM bikes
                            INNER JOIN brand ON brand.id = bikes.brand_ID
                            INNER JOIN discipline ON discipline.id = bikes.discipline_ID
                            INNER JOIN wheelSize ON wheelSize.id = bikes.wheelSize_ID");

    // execute
    $query->execute();

    $allBikes = $query->fetchAll();

    foreach($allBikes as $bike){
        $pic = $bike['pic_url'];
        $brand = $bike['brand_name'];
        $model = $bike['model'];
        $discipline = $bike['discipline_name'];
        $wheels = $bike['wheel_diameter'];
        
        echo "<div class='card'>";
            echo "<img class='bike-image' src='$pic' alt='$brand $model bike'>";
            echo '<div class="card-info-container">';
                echo "<section>Make: $brand</section>";
                echo "<section>Model: $model</section>";
                echo "<section>Discipline: $discipline</section>";
                echo "<section>Wheel Size: $wheels</section>";
            echo "</div>";
            echo "<div class='card-button-container'>";
                echo "<button>Edit Bike</button>";
                echo "<button>Delete Bike</button>";
            echo "</div>";
        echo "</div>";
    }
}