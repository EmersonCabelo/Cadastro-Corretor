<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM corretores WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $sql = "UPDATE corretores SET nome='$nome', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Atualizado com sucesso! <a href='listar_corretores.php'>Voltar</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>

<form method="post">
    Nome: <input type="text" name="nome" value="<?= $row['nome'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    <button type="submit">Salvar</button>
</form>
    