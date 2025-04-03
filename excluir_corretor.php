<?php
include 'conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM corretores WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Excluído com sucesso! <a href='listar_corretores.php'>Voltar</a>";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>

