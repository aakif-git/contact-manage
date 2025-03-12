<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "contact_manager_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected";
} catch(PDOException $e){
    echo "Connection Falied" . $e->getMessage();
}

?>