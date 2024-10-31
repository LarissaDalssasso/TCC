<?php
// Inicie a sessão, caso ainda não tenha iniciado
session_start();

// Inclua o arquivo de conexão com o banco de dados
include 'config.php';

// Capture os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$papel = $_POST['papel']; // Captura o papel selecionado no formulário
$area = $_POST['area'];
$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
$genero = $_POST['genero'];

// Prepare a instrução SQL para inserir os dados no banco de dados
$sql = "INSERT INTO funcionario (nome, email, papel, area, senha, genero) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Verifique se a preparação da instrução foi bem-sucedida
if ($stmt) {
    // Associe os parâmetros
    $stmt->bind_param("ssssss", $nome, $email, $papel, $area, $senha, $genero);

    // Execute a instrução e verifique se a execução foi bem-sucedida
    if ($stmt->execute()) {
        echo "Funcionário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar funcionário: " . $stmt->error;
    }

    // Feche a instrução
    $stmt->close();
} else {
    echo "Erro na preparação da instrução: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();