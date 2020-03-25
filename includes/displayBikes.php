<?php
if(!defined('SAFETORUN')){
    echo 'You can\'t run this file on its own.';
    die;
}

/**
 * Take in a DB connection and return the array of all bikes in the bikes table
 *
 * @param PDO $aDBConn
 * @return array
 */
function getBikesFromDB (PDO $aDBConn) : array {
    // prepare
    $query = $aDBConn->prepare("SELECT brand.brand_name, bikes.model, discipline.discipline_name, wheelSize.wheel_diameter, bikes.pic_url
                            FROM bikes
                            INNER JOIN brand ON brand.id = bikes.brand_ID
                            INNER JOIN discipline ON discipline.id = bikes.discipline_ID
                            INNER JOIN wheelSize ON wheelSize.id = bikes.wheelSize_ID");

    // execute
    $query->execute();

    $allBikes = $query->fetchAll();

    return $allBikes;
}

/**
 * Take in an array containing all bikes in the DB and return a card object for each in html
 *
 * @param array $allBikes
 * @return void
 */
function printCards (array $allBikes){
    $allCards = '';

    foreach($allBikes as $bike){
        $pic = $bike['pic_url'];
        $brand = $bike['brand_name'];
        $model = $bike['model'];
        $discipline = $bike['discipline_name'];
        $wheels = $bike['wheel_diameter'];
        
        $allCards .= "<div class='card'>";
        $allCards .= "<img class='bike-image' src='$pic' alt='$brand $model bike'>";
        $allCards .= '<div class="card-info-container">';
        $allCards .= "<section>Make: $brand</section>";
        $allCards .= "<section>Model: $model</section>";
        $allCards .= "<section>Discipline: $discipline</section>";
        $allCards .= "<section>Wheel Size: $wheels</section>";
        $allCards .= "</div>";
        $allCards .= "<div class='card-button-container'>";
        $allCards .= "<button>Edit Bike</button>";
        $allCards .= "<button>Delete Bike</button>";
        $allCards .= "</div>";
        $allCards .= "</div>";
    }
    return $allCards;
}