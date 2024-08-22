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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // Sanitização dos dados
    echo "Username: " . htmlspecialchars($user) . "<br>";
    echo "Password: " . htmlspecialchars($pass) . "<br>";

    // Verifica se os campos estão vazios
    if (empty($user) || empty($pass)) {
        header("Location: login.php?error=empty_fields");
        exit();
    }

    // Prepara e executa a consulta
    $stmt = $conn->prepare("SELECT * FROM funcionario WHERE email = ? OR nome = ?");
    $stmt->bind_param("ss", $user, $user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Senha do banco: " . $row['senha'] . "<br>";

        // Verifica a senha
        if (password_verify($pass, $row['senha'])) {
            echo "Senha verificada com sucesso!<br>";
            $_SESSION['username'] = $row['nome'];
            header("Location: ./index.html");
            exit();
        } else {
            echo "Senha incorreta<br>";
            header("Location: login.php?error=incorrect_password");
            exit();
        }
    } else {
        echo "Usuário não encontrado<br>";
        header("Location: login.php?error=user_not_found");
        exit();
    }
}

$conn->close();
?>
