<?php
session_start();
$conn = mysqli_connect("localhost", "root", "root", "site");

// Verifica se o formulário foi enviado
if (isset($_POST['salvar'])) {
    var_dump($_POST);
    $identificacao = $_POST['identificacao'];
    $representante_social = $_POST['representante-social'];
    $nome_fantasia = $_POST['nome-fantasia'];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $representante_legal = $_POST['representante-legal'];
    $cargo = $_POST['cargo'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco_representante = $_POST['endereco-representante'];
    $rua_representante = $_POST['rua-representante'];
    $numero_representante = $_POST['numero-representante'];
    $cidade_representante = $_POST['cidade-representante'];
    $estado_representante = $_POST['estado-representante'];
    $cep_representante = $_POST['cep-representante'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $raca = $_POST['raca'];
    $deficiencia = $_POST['deficiencia'];
    $tipo_deficiencia = $_POST['tipo-deficiencia'];
    $escolaridade = $_POST['escolaridade'];
    $curriculo = $_POST['curriculo'];




    if (isset($_FILES['curriculo']) && $_FILES['curriculo']['error'] == 0) {
        $curriculo = file_get_contents($_FILES['curriculo']['tmp_name']);
    } else {
        $curriculo = null; // ou outra lógica para lidar com erros
    }
    
    $sql = "INSERT INTO editalParte1 (identificacao, representante_social, nome_fantasia, cnpj, endereco, rua, numero, cidade, estado, cep, representante_legal, cargo, cpf, rg, endereco_representante, rua_representante, numero_representante, cidade_representante, estado_representante, cep_representante, telefone, genero, raca, deficiencia, tipo_deficiencia, escolaridade, curriculo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt->execute();
    $idParte1 = $stmt->insert_id;

    // Redireciona para a Parte 
    header("Location: editalParte2.php?id_parte1=$idParte1");
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
        href="assets/css/Fixed-navbar-starting-with-transparency-colors.css?h=cee0ab111828e10642ce8354c9a00ffe">
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
                    
                <li class="nav-item"><a class="nav-link" href="calendario.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CALENDÁRIO</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="cursos.php" style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CURSOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="editalPai.php"
                            style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EDITAL</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="cards.php"
                            style="margin-bottom: -22px;padding-top: 0px;padding-bottom: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EVENTOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="alas.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">ALAS</span></strong></a></li>

                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; padding-right: 0; margin-right: -10px; display: inline-block; width: fit-content; ">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                style="position: absolute; z-index: 1000;">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <?php if (isset($_SESSION['papel']) && $_SESSION['papel'] === 'admin'): ?>
                                    <li><a class="dropdown-item"
                                            href="./cadastro/administrar_funcionarios.php">Administrador</a></li>

                                <?php endif; ?>

                                <?php if (isset($_SESSION['papel']) && $_SESSION['papel'] === 'admin'): ?>
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

    <form id="form" action="salvar.php" method="post" enctype="multipart/form-data">
        <h1>Inscrições de Editais</h1>
        <p></p>
        <div>
            <label for="representante-social">Identificação da Pessoa</label>
            <p>
                <input type="radio" id="pessoa-juridica-sem-lucro" name="identificacao"
                    value="Pessoa Jurídica sem finalidade lucrativa">
                <label for="pessoa-juridica-sem-lucro">Pessoa Jurídica sem finalidade lucrativa</label>
        </div>
        <div>
            <input type="radio" id="pessoa-juridica-com-lucro" name="identificacao"
                value="Pessoa Jurídica com finalidade lucrativa">
            <label for="pessoa-juridica-com-lucro">Pessoa Jurídica com finalidade lucrativa</label>
        </div>
        <div>
            <label for="representante-social">Representante Social:</label>
            <input type="text" id="representante-social" name="representante-social">
        </div>
        <div>
            <label for="nome-fantasia">Nome Fantasia:</label>
            <input type="text" id="nome-fantasia" name="nome-fantasia">
        </div>
        <div>
            <label for="cnpj">CNPJ:</label>
            <input type="number" id="cnpj" name="cnpj">
        </div>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco">
            <div>
                <label for="rua">Rua:</label>
                <input type="text" id="rua" name="rua">
            </div>
            <div>
                <label for="numero">Número:</label>
                <input type="number" id="numero" name="numero">
            </div>
            <div>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
            </div>
            <div>
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
            </div>
            <div>
                <label for="cep">CEP:</label>
                <input type="number" id="cep" name="cep">
            </div>
        </div>
        <div>
            <label for="representante-legal">Representante Legal:</label>
            <input type="text" id="representante-legal" name="representante-legal">
        </div>
        <div>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo">
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="number" id="cpf" name="cpf">
        </div>
        <div>
            <label for="rg">RG:</label>
            <input type="number" id="rg" name="rg">
        </div>
        <div>
            <label for="endereco-representante">Endereço do Representante:</label>
            <input type="text" id="endereco-representante" name="endereco-representante">
            <div>
                <label for="rua-representante">Rua:</label>
                <input type="text" id="rua-representante" name="rua-representante">
            </div>
            <div>
                <label for="numero-representante">Número:</label>
                <input type="number" id="numero-representante" name="numero-representante">
            </div>
            <div>
                <label for="cidade-representante">Cidade:</label>
                <input type="text" id="cidade-representante" name="cidade-representante">
            </div>
            <div>
                <label for="estado-representante">Estado:</label>
                <input type="text" id="estado-representante" name="estado-representante">
            </div>
            <div>
                <label for="cep-representante">CEP:</label>
                <input type="number" id="cep-representante" name="cep-representante">
            </div>
        </div>
        <div>
            <label for="telefone"> Telefone/Whatsapp:</label>
            <input type="tel" id="telefone" name="telefone">
        </div>
        <div>
            <label for="genero">Gênero do Representante Legal:</label>
            <div>
                <input type="radio" id="mulher-cisgenero" name="genero" value="Mulher cisgênero">
                <label for="mulher-cisgenero">Mulher cisgênero</label>
            </div>
            <div>
                <input type="radio" id="homem-cisgenero" name="genero" value="Homem cisgênero">
                <label for="homem-cisgenero">Homem cisgênero</label>
            </div>
            <div>
                <input type="radio" id="mulher-transgenero" name="genero" value="Mulher Transgênero">
                <label for="mulher-transgenero">Mulher Transgênero</label>
            </div>
            <div>
                <input type="radio" id="homem-transgenero" name="genero" value="Homem Transgênero">
                <label for="homem-transgenero">Homem Transgênero</label>
            </div>
            <div>
                <input type="radio" id="nao-binaria" name="genero" value="Não BináriaBinárie">
                <label for="nao-binaria">Não BináriaBinárie</label>
            </div>
            <div>
                <input type="radio" id="nao-informar" name="genero" value="Não informar">
                <label for="nao-informar">Não informar</label>
            </div>
        </div>
        <div>
            <label for="raca">Raça/cor/etnia do Representante Legal:</label>
            <div>
                <input type="radio" id="branca" name="raca" value="Branca">
                <label for="branca">Branca</label>
            </div>
            <div>
                <input type="radio" id="preta" name="raca" value="Preta">
                <label for="preta">Preta</label>
            </div>
            <div>
                <input type="radio" id="parda" name="raca" value="Parda">
                <label for="parda">Parda</label>
            </div>
            <div>
                <input type="radio" id="amarela" name="raca" value="Amarela">
                <label for="amarela">Amarela</label>
            </div>
            <div>
                <input type="radio" id="indigena" name="raca" value="Indígena">
                <label for="indigena">Indígena</label>
            </div>
        </div>
        <div>
            <label for="deficiencia">Representante legal é pessoa com deficiência - PCD?</label>
            <div>
                <input type="radio" id="sim" name="deficiencia" value="Sim">
                <label for="sim">Sim</label>
            </div>
            <div>
                <input type="radio" id="nao" name="deficiencia" value="Não">
                <label for="nao">Não</label>
            </div>
        </div>
        <div>
            <label for="tipo-deficiencia">Caso tenha marcado "sim" qual o tipo de deficiência?</label>
            <div>
                <input type="radio" id="auditiva" name="tipo-deficiencia" value="Auditiva">
                <label for="auditiva">Auditiva</label>
            </div>
            <div>
                <input type="radio" id="fisica" name="tipo-deficiencia" value="Física">
                <label for="fisica">Física</label>
            </div>
            <div>
                <input type="radio" id="intelectual" name="tipo-deficiencia" value="Intelectual">
                <label for="intelectual">Intelectual</label>
            </div>
            <div>
                <input type="radio" id="multipla" name="tipo-deficiencia" value="Múltipla">
                <label for="multipla">Múltipla</label>
            </div>
            <div>
                <input type="radio" id="visual" name="tipo-deficiencia" value="Visual">
                <label for="visual">Visual</label>
            </div>
        </div>
        <div>
            <label for="escolaridade">Escolaridade do Representante Legal:</label>
            <div>
                <input type="radio" id="nao-tenho-educacao-formal" name="escolaridade"
                    value="Não tenho Educação Formal">
                <label for="nao-tenho-educacao-formal">Não tenho Educação Formal</label>
            </div>
            <div>
                <input type="radio" id="ensino-medio-incompleto" name="escolaridade" value="Ensino Médio Incompleto">
                <label for="ensino-medio-incompleto">Ensino Médio Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-fundamental-incompleto" name="escolaridade"
                    value="Ensino Fundamental Incompleto">
                <label for="ensino-fundamental-incompleto">Ensino Fundamental Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-medio-completo" name="escolaridade" value="Ensino Médio Completo">
                <label for="ensino-medio-completo">Ensino Médio Completo</label>
            </div>
            <div>
                <input type="radio" id="ensino-fundamental-completo" name="escolaridade"
                    value="Ensino Fundamental Completo">
                <label for="ensino-fundamental-completo">Ensino Fundamental Completo</label>
            </div>
            <div>
                <input type="radio" id="curso-tecnico-incompleto" name="escolaridade" value="Curso Técnico Incompleto">
                <label for="curso-tecnico-incompleto">Curso Técnico Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-superior-incompleto" name="escolaridade"
                    value="Ensino Superior Incompleto">
                <label for="ensino-superior-incompleto">Ensino Superior Incompleto</label>
            </div>
            <div>
                <input type="radio" id="ensino-superior-completo" name="escolaridade" value="Ensino Superior Completo">
                <label for="ensino-superior-completo">Ensino Superior Completo</label>
            </div>
            <div>
                <input type="radio" id="pos-graduacao-completo" name="escolaridade" value="Pós Graduação Completo">
                <label for="pos-graduacao-completo">Pós Graduação Completo</label>
            </div>
        </div>
        <div>
            <label for="curriculo">Currículo da Pessoa Jurídica:</label>
            <input type="file" id="curriculo" name="curriculo">
        </div>
        <div class="mt-3">
            <a href="index.php" class="btn btn-primary">Menu</a>
            <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
            <a href="editalParte2.php" class="btn btn-primary">Parte Dois</a>
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