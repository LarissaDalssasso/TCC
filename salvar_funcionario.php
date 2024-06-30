<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $area = $_POST['area'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];
    $sql = "INSERT INTO funcionario (nome, email, area, senha, genero) VALUES ('$nome', '$email','$area', '$senha', '$genero')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para a página de cadastro
		header("Location: cadastro.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
