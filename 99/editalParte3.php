<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Inscrição</title>
    <link rel="stylesheet" href="edital.css">
    <meta charset="UTF-8">

</head>

<body>
      <!-- Start: Fixed navbar starting with transparency -->
      <nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light"
        style="background-color: inherit;margin-top: -42px;padding-bottom: 0px;margin-bottom: 4px;padding-top: 0px;height: 2%; justify-content: center;">
        <div class="container">
            <div style="padding-top: 0px; margin-left:auto; margin-right: auto;"><button data-bs-toggle="collapse"
                    class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button></div>
            <div class="collapse navbar-collapse" id="navcol-1"
                style="padding-right: 0px;padding-top: 0px;padding-left: 0px;margin-bottom: -81px;padding-bottom: 85px;align-items: center;margin-top: 45px;">
                <a class="navbar-brand" href="index.php" style="margin-right: 2px;"><strong><span
                            style="color: rgb(255, 255, 255);">FECT</span></strong></a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="cursos.php" style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CURSOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="editalParte1.php" style="padding-top: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EDITAL</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="eventos.html"
                            style="margin-bottom: -22px;padding-top: 0px;padding-bottom: 0px;"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EVENTOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="alas.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">ALAS</span></strong></a></li>
                </ul>
                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item dropdown"> <!-- Não estava fechado corretamente -->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="font-size: 16px; font-weight: bold; color: #fff; text-decoration: none; padding-right: 0; margin-right: -10px; display: inline-block; width: fit-content;">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li> <!-- Fechamento correto aqui -->
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.html">
                            <strong><span style="color: rgb(255, 255, 255);">LOGIN</span></strong>
                        </a>
                    </li> <!-- Fechar corretamente aqui -->
                <?php } ?>

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

            <button type="submit" id="salvar" name="salvar">Salvar</button>
            <a href="index.php" class="btn btn-primary">Menu</a>
        </div>


    </form>
</body>

</html>