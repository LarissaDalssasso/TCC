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
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    if (empty($user) || empty($pass)) {
        $error = "Por favor, preencha todos os campos.";
    } else {
        // Verifica se o usuário foi encontrado
        $stmt = $conn->prepare("SELECT * FROM funcionario WHERE email = ? OR nome = ?");
        $stmt->bind_param("ss", $user, $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Verifica a senha
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['senha'])) {
                // Login bem-sucedido
                $_SESSION['username'] = $row['nome'];
                $_SESSION['papel'] = $row['papel']; // Salva o papel do usuário na sessão
                header("Location: ./index.php");
                exit();
            } else {
                $error = "Senha incorreta.";
            }
        } else {
            $error = "Usuário não encontrado.";
        }
    }

    if (isset($error)) {
        header("Location: login.html?error=" . urlencode($error));
        exit();
    }
}

$conn->close();
