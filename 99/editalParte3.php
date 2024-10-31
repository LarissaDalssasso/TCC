<!DOCTYPE html>
<html>

<head> <title>Formulário de Inscrição</title>
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

<body> <nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light"
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
                                    style="color: rgba(255, 255, 255, 0.8);">EDITAL</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="eventos.php"
                            style="margin-bottom: -22px;padding-top: 0px;padding-bottom: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EVENTOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="alas.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">ALAS</span></strong></a></li>

                  
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; padding-right: 0; margin-right: -10px; display: inline-block; width: fit-content;">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                <?php if (isset($_SESSION['papel']) && $_SESSION['papel'] === 'admin'): ?>
                                    <li><a class="dropdown-item" href="./cadastro/administrar_funcionarios.php">Administrador</a></li>

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
    </nav><!-- End: Fixed navbar starting with transparency -->

    <form id="form" action="salvar.php" method="post">

        <!-- Anexos -->
        <div>
            <label for="anexos">Anexos:</label>
            <input type="file" id="anexos" name="anexos" multiple>
        </div>
        <div>
            <label for="estatuto-social">Estatuto Social, com sede no Município e finalidade cultural,
                devidamente registrado:</label>
            <input type="file" id="estatuto-social" name="estatuto-social">
        </div>
        <div>
            <label for="ata-eleicao-pose">Ata de eleição e posse devidamente registrada:</label>
            <input type="file" id="ata-eleicao-pose" name="ata-eleicao-pose">
        </div>
        <div>
            <label for="cnpj">Cópia do Cadastro Nacional de Pessoa Jurídica:</label>
            <input type="file" id="cnpj" name="cnpj">
        </div>
        <div>
            <label for="documento-pessoal-dirigente">Cópia de documento pessoal que contenha o CPF e RG do
                dirigente da OSC:</label>
            <input type="file" id="documento-pessoal-dirigente" name="documento-pessoal-dirigente">
        </div>
        <div>
            <label for="comprovante-residencia-dirigente">Cópia de comprovante de residência do dirigente da
                OSC:</label>
            <input type="file" id="comprovante-residencia-dirigente" name="comprovante-residencia-dirigente">
        </div>
        <div>
            <label for="declaracoes-gerais">Declarações gerais (Anexo II):</label>
            <input type="file" id="declaracoes-gerais" name="declaracoes-gerais">
        </div>
        <div>
            <label for="certificado-condicao-microempreendedor">Certificado de Condição de Microempreendedor
                Individual – CCMEI ou Contrato Social, com sede no Município de Ibirama anterior ao mês de julho
                de 2022:</label>
            <input type="file" id="certificado-condicao-microempreendedor"
                name="certificado-condicao-microempreendedor">
        </div>
        <div>
            <label for="cnpj-ativo"> Cópia de Cadastro Nacional de Pessoa Jurídica ativo com Classificação
                Nacional de Atividades Econômicas (CNAE) vinculado ao setor cultural:</label>
            <input type="file" id="cnpj-ativo" name="cnpj-ativo">
        </div>
        <div>
            <label for="documento-pessoal-socio">Cópia de documento pessoal que contenha CPF e RG do sócio
                proprietário:</label>
            <input type="file" id="documento-pessoal-socio" name="documento-pessoal-socio">
        </div>
        <div>
            <label for="comprovante-residencia-socio">Cópia do comprovante de residência do sócio
                proprietário:</label>
            <input type="file" id="comprovante-residencia-socio" name="comprovante-residencia-socio">
        </div>
        <div>
            <label for="declaracoes-gerais-socio">Declarações Gerais (Anexo II):</label>
            <input type="file" id="declaracoes-gerais-socio" name="declaracoes-gerais-socio">
        </div>

        <div class="mt-3">
            <a href="editalParte2.php" class="btn btn-primary">Parte Dois</a>

            <button type="submit"  class="btn btn-primary"  name="salvar">Salvar</button>
            <a href="index.php" class="btn btn-primary">Menu</a>
        </div>


    </form>
</body>

</html>