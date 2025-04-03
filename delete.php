<?php
include 'conexao.php';

$id = $_POST['id'] ?? '';

if (empty($id)) {
    echo json_encode(["success" => false, "message" => "ID inválido."]);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM corretores WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(["success" => true, "message" => "Corretor excluído com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro ao excluir corretor."]);
}
?>

