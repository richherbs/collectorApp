<?php

function printCards (array $allBikes){
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