<?php
session_start();

include './cadastro/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    $imagem1 = $_FILES['imagem1'];
    $imagem2 = $_FILES['imagem2'];
    $imagem3 = $_FILES['imagem3'];

    $diretorioImagens = "assets/img/";
    $caminhoImagem1 = $diretorioImagens . basename($imagem1["name"]);
    $caminhoImagem2 = $diretorioImagens . basename($imagem2["name"]);
    $caminhoImagem3 = $diretorioImagens . basename($imagem3["name"]);

    move_uploaded_file($imagem1["tmp_name"], $caminhoImagem1);
    move_uploaded_file($imagem2["tmp_name"], $caminhoImagem2);
    move_uploaded_file($imagem3["tmp_name"], $caminhoImagem3);

    $sql = "INSERT INTO eventos (titulo, data, descricao, imagem1, imagem2, imagem3) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $titulo, $data, $descricao, $caminhoImagem1, $caminhoImagem2, $caminhoImagem3);

    if ($stmt->execute()) {
        header("Location: cards.php");
        exit();
    } else {
        echo "Erro ao cadastrar evento: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($conn)) {
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
    <link rel="stylesheet" href="evento.css">
</head>

<body>
    <div class="form-container">
        <h2>Cadastro de Evento</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título do Evento" required>
            <input type="date" name="data" required>
            <textarea name="descricao" placeholder="Descrição do Evento" required></textarea>

            <input type="file" name="imagem1" accept="image/*" required>
            <input type="file" name="imagem2" accept="image/*" required>
            <input type="file" name="imagem3" accept="image/*" required>

            <button type="submit">Cadastrar Evento</button>
        </form>
    </div>
</body>

</html>