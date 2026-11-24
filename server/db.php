<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mahimaEngineering";

$conn = mysqli_connect($host, $user, $pass, $db,3307);

if (!$conn) {
    die("Database connection failed");
}
?>
