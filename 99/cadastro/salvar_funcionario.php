<?php
session_start();
include 'config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$papel = $_POST['papel'];
$area = $_POST['area'];
$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
$genero = $_POST['genero'];

// Verifica se o e-mail já existe
$sql_check = "SELECT * FROM funcionario WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    echo "<script>
            alert('E-mail já existente!');
            window.history.back();
          </script>";
} else {
    $sql = "INSERT INTO funcionario (nome, email, papel, area, senha, genero) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $nome, $email, $papel, $area, $senha, $genero);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Funcionário cadastrado com sucesso!');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "Erro ao cadastrar funcionário: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro na preparação da instrução: " . $conn->error;
    }
}

$stmt_check->close();
$conn->close();
?>