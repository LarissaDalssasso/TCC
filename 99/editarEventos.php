<?php
include './cadastro/config.php';
session_start();

if (!isset($_SESSION['papel']) || $_SESSION['papel'] !== 'admin') {
    echo "Acesso negado. Apenas administradores podem acessar esta página.";
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: cards.php");
    exit();
}

$id = intval($_GET['id']);

$query = "SELECT * FROM eventos WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
    header("Location: cards.php");
    exit();
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $titulo = trim($_POST['titulo']);
        $descricao = trim($_POST['descricao']);

        if (empty($titulo) || empty($descricao)) {
            $message = "<div class='alert alert-danger'>Por favor, preencha todos os campos.</div>";
        } else {
            $updateQuery = "UPDATE eventos SET titulo = ?, descricao = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ssi", $titulo, $descricao, $id);
            if ($updateStmt->execute()) {
                header("Location: cards.php?message=Evento atualizado com sucesso");
                exit();
            } else {
                $message = "<div class='alert alert-danger'>Erro ao atualizar o evento.</div>";
            }
        }
    }

    if (isset($_POST['delete'])) {
        $deleteQuery = "DELETE FROM eventos WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $id);
        if ($deleteStmt->execute()) {
            header("Location: cards.php?message=Evento excluído com sucesso");
            exit();
        } else {
            $message = "<div class='alert alert-danger'>Erro ao excluir o evento.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./cadastro/index.css">
    <link rel="stylesheet" href="./cadastro/Styke.css">

</head>
<body >
<div class="container mt-5">
    <h2 class="text-center">Editar Evento</h2>
    <?php if ($message): ?>
        <?php echo $message; ?>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($event['titulo']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?php echo htmlspecialchars($event['descricao']); ?></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="update" class="btn btn-primary">Atualizar</button>
            <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este evento?')">Excluir</button>
        </div>
    </form>
    
    <div class="mt-3">
        <a href="cards.php" class="btn btn-secondary">Voltar</a>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>