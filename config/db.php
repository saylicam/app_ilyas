<?php
$host = "sql304.infinityfree.com";
$db_name = "if0_36730779_app_ilyas";
$username = "if0_36730779";
$password = "OpSDbetMxdfpHO";

try {
    // Établir la connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->exec("set names utf8");
} catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}



