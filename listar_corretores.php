<?php
include 'conexao.php'; // Arquivo de conexão com o banco

$sql = "SELECT * FROM corretores";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nome']}</td>
            <td>{$row['email']}</td>
            <td>
                <a href='editar_corretor.php?id={$row['id']}'>✏️ Editar</a> | 
                <a href='excluir_corretor.php?id={$row['id']}' onclick='return confirm(\"Tem certeza?\")'>🗑️ Excluir</a>
            </td>
         </tr>";
}

echo "</table>";

$conn->close();
?>
