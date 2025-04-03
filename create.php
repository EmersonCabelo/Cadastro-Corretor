<?php
include 'conexao.php';

$cpf = $_POST['cpf'] ?? '';
$creci = $_POST['creci'] ?? '';
$nome = $_POST['nome'] ?? '';

if (empty($cpf) || empty($creci) || empty($nome)) {
    echo json_encode(["success" => false, "message" => "Todos os campos são obrigatórios."]);
    exit;
}

try {
    // Verifica se o CPF já está cadastrado
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM corretores WHERE cpf = ?");
    $stmt->execute([$cpf]);
    if ($stmt->fetchColumn() > 0) {
        echo json_encode(["success" => false, "message" => "Este CPF já está cadastrado."]);
        exit;
    }

    // Insere o novo corretor
    $stmt = $pdo->prepare("INSERT INTO corretores (cpf, creci, nome) VALUES (?, ?, ?)");
    $stmt->execute([$cpf, $creci, $nome]);

    echo json_encode(["success" => true, "message" => "Corretor cadastrado com sucesso!"]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erro ao cadastrar corretor."]);
}
?>
