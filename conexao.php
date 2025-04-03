<?php
$host = "localhost";
$dbname = "imovel_guide";
$usuario = "root";  // Altere se seu MySQL tiver usuário diferente
$senha = "";        // Altere se sua senha for diferente

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

