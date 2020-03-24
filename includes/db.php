<?php

// connect
$db = new PDO('mysql:host=db; dbname=bikeCollectorApp', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// prepare
$query = $db->prepare("SELECT brand.brand_name, bikes.model, discipline.discipline_name, wheelSize.wheel_diameter
                        FROM bikes
                        INNER JOIN brand ON brand.id = bikes.brand_ID
                        INNER JOIN discipline ON discipline.id = bikes.discipline_ID
                        INNER JOIN wheelSize ON wheelSize.id = bikes.wheelSize_ID");

// execute
$query->execute();

$bikes = $query->fetchAll();

echo '<pre>';
var_dump($bikes);
echo '</pre>';