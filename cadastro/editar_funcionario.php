<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $area = $_POST['area'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];

    $sql = "UPDATE funcionario SET nome='$nome', email='$email', area='$area', senha='$senha', genero='$genero' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Funcionário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar funcionário: " . $conn->error;
    }

    $conn->close();

    // Redirecionar de volta para a página de administração de funcionários
    header("Location: administrar_funcionarios.php");
    exit;
} else {
    $sql = "SELECT * FROM funcionario WHERE id=$id";
    $result = $conn->query($sql);
    $funcionario = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./editar.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <h2 class="card-title">Editar Funcionário</h2>
            <form action="editar_funcionario.php?id=<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        value="<?php echo $funcionario['nome']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $funcionario['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="area">Área:</label>
                    <input type="text" class="form-control" id="area" name="area"
                        value="<?php echo $funcionario['area']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha"
                        value="<?php echo $funcionario['senha']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="genero">Gênero:</label>
                    <select class="form-control" id="genero" name="genero" required>
                        <option value="Masculino" <?php if ($funcionario['genero'] == 'Masculino')
                            echo 'selected'; ?>>
                            Masculino</option>
                        <option value="Feminino" <?php if ($funcionario['genero'] == 'Feminino')
                            echo 'selected'; ?>>
                            Feminino</option>
                        <option value="Outro" <?php if ($funcionario['genero'] == 'Outro')
                            echo 'selected'; ?>>Outro
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>