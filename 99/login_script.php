<?php
// login_script.php

// Iniciar a sessão
session_start();

// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Altere conforme necessário
$password = "root"; // Altere conforme necessário
$dbname = "site";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter os valores do formulário
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Preparar e executar a consulta SQL
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE email = ? OR nome = ?");
    $stmt->bind_param("ss", $user, $user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar a senha
        if (password_verify($pass, $row['senha'])) {
            // Armazenar informações do usuário na sessão
            $_SESSION['username'] = $row['nome'];
            // Redirecionar para a página inicial
            header("Location: pagina_inicial.php");
            exit();
        } else {
            // Senha incorreta
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Usuário não encontrado
        header("Location: login.php?error=1");
        exit();
    }
}

// Fechar conexão
$conn->close();
?>
