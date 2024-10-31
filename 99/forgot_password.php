<?php
session_start();

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

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o token e a nova senha estão definidos
    if (isset($_POST['token']) && isset($_POST['new_password'])) {
        $token = $_POST['token'];
        $new_password = $_POST['new_password'];

        // Verifica se o token e a nova senha estão preenchidos
        if (empty($token) || empty($new_password)) {
            echo "Token ou nova senha não podem estar vazios.";
            exit();
        }

        // Prepara e executa a consulta para verificar o token
        $stmt = $conn->prepare("SELECT * FROM funcionario WHERE reset_token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        // Se o token for válido, atualiza a senha
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Atualiza a senha (certifique-se de usar hashing)
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE funcionario SET senha = ?, reset_token = NULL WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);
            $stmt->execute();

            echo "Senha redefinida com sucesso!";
        } else {
            echo "Token inválido ou expirado.";
        }
    } else {
        echo "Token ou nova senha não podem estar vazios.";
    }
} else {
    // Se não for um POST, pode redirecionar ou exibir uma mensagem
    echo "Método inválido.";
}

$conn->close();