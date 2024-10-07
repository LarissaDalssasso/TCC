<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "site";

// Criação da conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    // Verifica se o email está vazio
    if (empty($email)) {
        header("Location: forgot_password.html?error=empty_email");
        exit();
    }

    // Prepara e executa a consulta
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Gera um token de reset de senha
        $token = bin2hex(random_bytes(16));

        // Atualiza o token de reset de senha no banco de dados
        $stmt = $conn->prepare("UPDATE funcionario SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Envia um email com o link de reset de senha
        $subject = "Reset de Senha";
        $message = "Clique no link abaixo para resetar sua senha: <a href='reset_password.php?token=$token'>Resetar Senha</a>";
        $headers = "From: seu_email@example.com\r\n";
        mail($email, $subject, $message, $headers);

        header("Location: forgot_password.html?success=email_sent");
        exit();
    } else {
        header("Location: forgot_password.html?error=user_not_found");
        exit();
    }
}

$conn->close();