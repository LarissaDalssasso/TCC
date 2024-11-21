<?php
session_start();
$conn = mysqli_connect("localhost", "root", "root", "site");

// Verificar conexão
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM editalParte2 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['edital_excluido'] = true; // Mensagem de sucesso
    } else {
        $_SESSION['edital_excluido'] = false; // Mensagem de erro
    }

    $stmt->close();
}

mysqli_close($conn);
header("Location: editalPai.php"); // Redireciona de volta para a página de editais
exit();
