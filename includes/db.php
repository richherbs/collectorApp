<?php

// connect
$db = new PDO('mysql:host=db; dbname=bikeCollectorApp', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// prepare
$query = $db->prepare("SELECT * FROM bikes");
// execute
$query->execute();

$bikes = $query->fetchAll();

echo '<pre>';
var_dump($bikes);
echo '</pre>';