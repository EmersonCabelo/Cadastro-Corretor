<?php
include 'conexao.php';

$id = $_POST['id'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$creci = $_POST['creci'] ?? '';
$nome = $_POST['nome'] ?? '';

if (empty($id) || empty($cpf) || empty($creci) || empty($nome)) {
    echo json_encode(["success" => false, "message" => "Todos os campos são obrigatórios."]);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE corretores SET cpf = ?, creci = ?, nome = ? WHERE id = ?");
    $stmt->execute([$cpf, $creci, $nome, $id]);

    echo json_encode(["success" => true, "message" => "Corretor atualizado com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro ao editar corretor."]);
}
?>
    