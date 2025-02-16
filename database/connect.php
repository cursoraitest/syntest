<?php
include("config.php");

$charset = 'utf8';
try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=$charset", $dbUser, $dbPass);
} catch(PDOException $e) {
    //show error
    die("Bağlantı kurulamadı: " . $e->getMessage());
}

error_reporting(0);