<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "seu_banco"; // Substitua pelo nome do seu banco

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

