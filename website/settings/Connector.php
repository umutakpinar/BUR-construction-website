<?php
$host = "localhost";
$dbname = "bur_construction";
$username = "root";
$password = "root";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("SET @@lc_time_names = 'tr_TR';");
    $conn->query("SET CHARACTER SET utf8mb4;");
    $conn->query("SET CHARACTER_SET_CONNECTION=utf8mb4;");
} catch (PDOException $e) {
    echo $e->getMessage();
}
