<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM funcionario WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Funcionario excluído com sucesso!";
} else {
    echo "Erro ao excluir funcionario: " . $conn->error;
}

$conn->close();

// Redirecionar de volta para a página de cadastro
header("Location: administrar_funcionarios.php");
