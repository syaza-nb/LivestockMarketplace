<?php
$host = "localhost";
$port = "5432";
$dbname = "livestock_db";
$user = "postgres"; 
$password = "admin"; 

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("SET TIME ZONE 'Asia/Kuala_Lumpur';");

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>