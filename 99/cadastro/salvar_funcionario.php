<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Obter e escapar os valores do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $area = $conn->real_escape_string($_POST['area']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $genero = $conn->real_escape_string($_POST['genero']);

    // Hash da senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO funcionario (nome, email, area, senha, genero) VALUES ('$nome', '$email','$area', '$hashed_password', '$genero')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar de volta para a página de cadastro
        header("Location: ../login.html");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
}
