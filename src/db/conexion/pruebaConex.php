<?php
$servername = "localhost";
$username = "ATM";
$password = "nutricraft123";
$dbname = "nutricraft";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>
