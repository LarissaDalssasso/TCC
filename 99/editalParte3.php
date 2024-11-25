<?php
session_start();
$conn = mysqli_connect("localhost", "root", "root", "site");

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if (isset($_POST['salvar'])) {
    var_dump($_POST); // Para depuração
    $estatuto_social = $_FILES['estatuto-social']['name'];
    $ata_eleicao_pose = $_FILES['ata-eleicao-pose']['name'];
    $documento_identidade = $_FILES['documento-pessoal-dirigente']['name'];
    $comprovante_residencia = $_FILES['comprovante-residencia-dirigente']['name'];
    $outros_documentos = $_FILES['certificado-condicao-microempreendedor']['name']; // Ajuste conforme necessário

    // Move os arquivos para o diretório de uploads
    move_uploaded_file($_FILES['estatuto-social']['tmp_name'], 'uploads/' . $estatuto_social);
    move_uploaded_file($_FILES['ata-eleicao-pose']['tmp_name'], 'uploads/' . $ata_eleicao_pose);
    move_uploaded_file($_FILES['documento-pessoal-dirigente']['tmp_name'], 'uploads/' . $documento_identidade);
    move_uploaded_file($_FILES['comprovante-residencia-dirigente']['tmp_name'], 'uploads/' . $comprovante_residencia);
    move_uploaded_file($_FILES['certificado-condicao-microempreendedor']['tmp_name'], 'uploads/' . $outros_documentos); // Ajuste conforme necessário

    // Salvar na tabela editalParte3
    $sql = "INSERT INTO editalParte3 (id_parte2, estatuto_social, ata_eleicao_pose, documento_pessoal_dirigente, comprovante_residencia_dirigente, outros_documentos) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . htmlspecialchars($conn->error));
    }

    // Aqui, ajuste os parâmetros para corresponder à sua tabela
    $stmt->bind_param("isssss", $_GET['id_parte2'], $estatuto_social, $ata_eleicao_pose, $documento_identidade, $comprovante_residencia, $outros_documentos);
    
    // Executa a consulta
    if (!$stmt->execute()) {
        die("Erro ao executar a consulta: " . htmlspecialchars($stmt->error));
    }

    // Redireciona após salvar
    header("Location: editalPai.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Inscrição</title>
    <link rel="stylesheet" href="edital.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no;">
    <title>Edital</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Cardo.css?h=54435dcaa177a916e3e63e7316171ab2">
    <link rel="stylesheet" href="assets/css/Lora.css?h=8d0d5802b74a1ea44811aa3318e6cda4">
    <link rel="stylesheet" href="assets/css/Open%20Sans.css?h=9e213a74de5b277830c6eb6bd5f5862d">
    <link rel="stylesheet" href="assets/css/Roboto.css?h=26433eca780f70f93a970c5403b3ba8a">
    <link rel="stylesheet" href="assets/css/accordion-faq-list.css?h=03017b5fe5da3d3fd1f6bdfafaec34cf">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css?h=da4d1cf3be712304717573ab3cf0bbe3">
    <link rel="stylesheet" href="assets/css/Carousel-Multi-Image--ISA-.css?h=3a42df1cc3eaeb061a294987537c4cee">
    <link rel="stylesheet" href="assets/css/Corporate-Footer-Clean.css?h=d441d77de4880d53c739b4a52a593159">
    <link rel="stylesheet" href="assets/css/faq.css?h=12592fb6d6bd9a3e0e5e469de7b4b7d2">
    <link rel="stylesheet" href="assets/css/faq.compiled.css?h=1688e06fc52004af4926270c96a0bef7">
    <link rel="stylesheet" href="assets/css/Footer-Dark-Multi-Column-icons.css?h=befd8a398792e305b7ffd4a176b5b585">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="assets/css/Masonry-gallery-cards-responsive.css?h=179c54b3d671ef8d56e046cb9cffb0bd">
    <link rel="stylesheet" href="assets/css/News-Cards-1.css?h=19de63894dd5898d7874581c81f61f35">
    <link rel="stylesheet" href="assets/css/News-Cards.css?h=f5670ae41835ad3f2c29fb53f9cfb93f">
    <link rel="stylesheet" href="assets/css/untitled.css?h=c4a4fb8d4b04afd37d06542391175254">
    <link rel="stylesheet" href="assets/css/Waves---DentalTech.css?h=628c01a359dbc6e2de829e0469c6b52e">
    <link rel="stylesheet" href="assets/css/form.css?h=193234bc42a8caa5a234be2173f3e1d6">
    <link rel="stylesheet" href="assets/css/formatacao.css?h=44bd75216289d00ac8c938eccbd9b67b">
    <link rel="stylesheet" href="assets/css/espacamentos.css?h=f982ad878b86b64ed6ecf5b558b6f5f3">
    <link rel="stylesheet"
        href="assets/css/Fixed-navbar-starting-with-transparency-styles.css?h=7587f1df9059ad49d5a6efd0bdf71cbf">
    <link rel="stylesheet"
        href="assets/css/Fixed-navbar-starting-with-transparency-colors.css?h =cee0ab111828e10642ce8354c9a00ffe">
    <link rel="stylesheet" href="assets/css/dh-card-image-left-dark.css?h=fbeb7871206b72100c90953ca6cc43cc">
    <link rel="stylesheet" href="assets/css/Login-screen.css?h=a83d532a2ddb77352016bff7774f7e85">
    <link rel="stylesheet" href="assets/css/Navigation-Menu.css?h=587a88704dc45b107523dd7422062369">
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light"
        style="background-color: inherit;margin-top: -42px;padding-bottom: 0px;margin-bottom: 4px;padding-top: 0px;height: 2%; justify-content: center;">
        <div class="container">
            <div style="padding-top: 0px; margin-left:auto; margin-right: auto;">
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                    <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1"
                style="padding-right: 0px;padding-top: 0px;padding-left: 0px;margin-bottom: -81px;padding-bottom: 85px;align-items: center;margin-top: 45px;">
                <a class="navbar-brand" href="index.php" style="margin-right: 2px;"><strong><span
                            style="color: rgb(255, 255, 255);">FECT</span></strong></a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="cursos.php" style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CURSOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="editalPai.php"
                            style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255,                                     255, 255, 0.8);">EDITAL</span></strong></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="cards.php"
                            style="margin-bottom: -22px;padding-top: 0px;padding-bottom: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EVENTOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="alas.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">ALAS</span></strong></a></li>

                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; padding-right: 0; margin-right: -10px; display: inline-block; width: fit-content;">
                                <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                style="position: absolute; z-index: 1000;">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <?php if (isset($_SESSION['papel']) && $_SESSION['papel'] === 'admin'): ?>
                                    <li><a class="dropdown-item"
                                            href="./cadastro/administrar_funcionarios.php">Administrador</a></li>
                                    <li><a class="dropdown-item" href="cadastrarEvento.php">Cadastrar Eventos</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="login.html">
                                <strong><span style="color: rgb(255, 255, 255);">LOGIN</span></strong>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
<form id="form" action="salvar.php?id_parte2=1" method="post" enctype="multipart/form-data">
    <div class="container mt-5" style="margin-top: 100px;"> <!-- Adicionando espaçamento superior -->
            <h3>Anexos:</h3>
            <div class="row">
                <!-- Anexo 1 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;"> <!-- Aumentando o raio das bordas -->
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Estatuto Social</strong></h5>
                            <p class="card-text">Com sede no Município e finalidade cultural, devidamente registrado.</p>
                            <input type="file" id="estatuto-social" name="estatuto-social" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 2 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Ata de Eleição e Posse</strong></h5>
                            <p class="card-text">Devidamente registrada.</p>
                            <input type="file" id="ata-eleicao-pose" name="ata-eleicao-pose" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 3 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>CNPJ</strong></h5>
                            <p class="card-text">Cópia do Cadastro Nacional de Pessoa Jurídica.</p>
                            <input type="file" id="cnpj" name="cnpj" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 4 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Documento Pessoal do Dirigente</strong></h5>
                            <p class="card-text">Cópia que contenha CPF e RG.</p>
                            <input type="file" id="documento-pessoal-dirigente" name="documento-pessoal-dirigente" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 5 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Comprovante de Residência do Dirigente</strong></h5>
                            <p class="card-text">Cópia do comprovante de residência.</p>
                            <input type="file" id="comprovante-residencia-dirigente" name="comprovante-residencia-dirigente" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 6 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Certificado de Condição de Microempreendedor</strong></h5>
                            <p class="card-text">CCMEI ou Contrato Social, com sede no Município de Ibirama anterior ao mês de julho de 2022.</p>
                            <input type="file" id="certificado-condicao-microempreendedor" name="certificado-condicao-microempreendedor" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 7 -->
                <div class="col-md- 6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>CNPJ Ativo</strong></h5>
                            <p class="card-text">Cópia de Cadastro Nacional de Pessoa Jurídica ativo com CNAE vinculado ao setor cultural.</p>
                            <input type="file" id="cnpj-ativo" name="cnpj-ativo" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 8 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Documento Pessoal do Sócio Proprietário</strong></h5>
                            <p class="card-text">Cópia que contenha CPF e RG.</p>
                            <input type="file" id="documento-pessoal-socio" name="documento-pessoal-socio" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 9 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Comprovante de Residência do Sócio Proprietário</strong></h5>
                            <p class="card-text">Cópia do comprovante de residência.</p>
                            <input type="file" id="comprovante-residencia-socio" name="comprovante-residencia-socio" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Anexo 10 -->
                <div class="col-md-6 mb-3">
                    <div class="card" style="border: 1px solid #ccc; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><strong>Declarações Gerais (Anexo II)</strong></h5>
                            <p class="card-text">Envie as declarações gerais.</p>
                            <input type="file" id="declaracoes-gerais-socio" name="declaracoes-gerais-socio" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <a href="assets/img/ANEXO_II.pdf" class="btn btn-secondary" download>Baixar Anexo II</a>
            </div>
        </div>
        <div class="mt-3">
            <a href="editalParte2.php" class="btn btn-primary">Parte Dois</a>
            <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
            <a href="editalPai.php" class="btn btn-primary">Menu</a>
        </div>
    </form>
    <script>
        // Salvar dados no Local Storage ao sair de cada campo
        document.querySelectorAll('input, textarea').forEach(element => {
            element.addEventListener('input', () => {
                localStorage.setItem(element.id, element.value);
            });
        });

        // Restaurar dados ao carregar a página
        window.addEventListener('load', () => {
            document.querySelectorAll('input, textarea').forEach(element => {
                if (localStorage.getItem(element.id)) {
                    element.value = localStorage.getItem(element.id);
                }
            });
        });

        // Limpar Local Storage após o envio do formulário
        document.getElementById('form').addEventListener('submit', () => {
            localStorage.clear();
        });
    </script>
</body>

</html>