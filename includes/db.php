<?php
if(!defined('SAFETORUN')){
    echo 'You can\'t run this file on its own.';
    die;
}

/**
 * Creates a connection to a mysql database defined by the information passed into the function
 *
 * @param string $aDBName - database name
 * @param string $aUser - username
 * @param string $aPass - password
 * @return PDO - return the database object
 */
function connectToMySQLDb(string $aDBName, string $aUser, string $aPass) : PDO {
    // connect
    $db = new PDO("mysql:host=db; dbname=$aDBName", $aUser, $aPass);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

$DBName = 'bikeCollectorApp';
$user = 'root';
$pass = 'password';
$db = connectToMySQLDb($DBName, $user, $pass);