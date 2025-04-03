<?php
include 'conexao.php';

try {
    $stmt = $pdo->query("SELECT * FROM corretores ORDER BY data_cadastro DESC");
    $corretores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($corretores);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erro ao buscar corretores"]);
}
?>
