<?php
require "conexao.php";

$response = ["success" => false, "message" => "Erro ao cadastrar corretor."];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cpf = trim($_POST["cpf"]);
    $creci = trim($_POST["creci"]);
    $nome = trim($_POST["nome"]);

    if (!empty($cpf) && !empty($creci) && !empty($nome)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO corretores (cpf, creci, nome) VALUES (:cpf, :creci, :nome)");
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":creci", $creci);
            $stmt->bindParam(":nome", $nome);

            if ($stmt->execute()) {
                $response["success"] = true;
                $response["message"] = "Corretor cadastrado com sucesso!";
            }
        } catch (PDOException $e) {
            $response["message"] = "Erro ao cadastrar: " . $e->getMessage();
        }
    } else {
        $response["message"] = "Todos os campos são obrigatórios.";
    }
}

echo json_encode($response);
?>