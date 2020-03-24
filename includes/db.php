<?php

// connect
$db = new PDO('mysql:host=db; dbname=bikeCollectorApp', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
