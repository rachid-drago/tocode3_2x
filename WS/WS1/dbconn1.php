<?php

$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "soctp";

try {
    $dbconn = new PDO('mysql:host=localhost;dbname=soctp', $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
