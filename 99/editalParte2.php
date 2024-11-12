<?php session_start(); ?> 
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
                                    <li><a class="dropdown-item"
                                            href="cadastrarEvento.php">Cadastrar Eventos</a></li>

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
    <form id="form" action="salvar.php" method="post">   

          <!-- Planejamento e Organização -->
          <div>
            <label for="nome-projeto">Nome do Projeto:</label>
            <textarea type="text" id="nome-projeto" name="nome-projeto"></textarea>
            

        </div>
        <div>
            <label for="categoria">Escolha a categoria a que vai concorrer:</label>
            <div>
                <input type="radio" id="categoria-1" name="categoria"
                    value="1.1. Apoio exclusivo à produção audiovisual (R$ 93.700,19)">
                <label for="categoria-1">1.1. Apoio exclusivo à produção audiovisual (R$ 93.700,19)</label>
            </div>
            <div>
                <input type="radio" id="categoria-2" name="categoria"
                    value="1.2. Apoio à reforma de sala de cinema, implantação de cinema de rua ou cinema itinerante (R$22.544,94)">
                <label for="categoria-2">1.2. Apoio à reforma de sala de cinema, implantação de cinema de rua ou cinema
                    itinerante (R$22.544,94)</label>
            </div>
            <div>
                <input type="radio" id="categoria-3" name="categoria"
                    value="1.3. Projeto que vise o desenvolvimento da cidade como locação (R$ 11.319,01)">
                <label for="categoria-3">1.3. Projeto que vise o desenvolvimento da cidade como locação (R$
                    11.319,01)</label>
            </div>
            <div>
                <input type="radio" id="categoria-4" name="categoria" value="1.4. Artes Visuais (R$ 17.890,74)">
                <label for="categoria-4">1.4. Artes Visuais (R$ 17.890,74)</label>
            </div>
            <div>
                <input type="radio" id="categoria-5" name="categoria" value="1.5. Música (R$ 17.890,74)">
                <label for="categoria-5">1.5. Música (R$ 17.890,74)</label>
            </div>
            <div>
                <input type="radio" id="categoria-6" name="categoria" value="1.6. Artes Cênicas (R$ 17.890,74)">
                <label for="categoria-6">1.6. Artes Cênicas (R$ 17.890,74)</label>
            </div>
        </div>
        <div>
            <label for="descricao-projeto">Descrição do Projeto para o Site:</label>
            <textarea id="descricao-projeto" name="descricao-projeto"></textarea>
        </div>
        <div>
            <label for="objetivo">Objetivo:</label>
            <textarea id="objetivo" name="objetivo"></textarea>
        </div>
        <div>
            <label for="meta">Meta:</label>
            <textarea id="meta" name="meta"></textarea>
        </div>
        <div>
            <label for="publico">Público:</label>
            <textarea id="publico" name="publico"></textarea>
        </div>
        <div>
            <label for="acao-cultural">Sua ação cultural é voltada prioritariamente para algum destes perfis de
                público?</label>
            <div>
                <input type="checkbox" id="pessoas-vitimas-violencia" name="acao-cultural"
                    value="Pessoas vítimas de violência">
                <label for="pessoas-vitimas-violencia">Pessoas vítimas de violência</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-pobreza" name="acao-cultural" value="Pessoas em situação de pobreza">
                <label for="pessoas-pobreza">Pessoas em situação de pobreza</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-rua" name="acao-cultural"
                    value="Pessoas em situação de rua (moradores de rua)">
                <label for="pessoas-rua">Pessoas em situação de rua (moradores de rua)</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-restricao-liberdade" name="acao-cultural"
                    value="Pessoas em situação de restrição e privação de liberdade (população carcerária)">
                <label for="pessoas-restricao-liberdade">Pessoas em situação de restrição e privação de liberdade
                    (população carcerária)</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-deficiencia" name="acao-cultural" value="Pessoas com deficiência">
                <label for="pessoas-deficiencia">Pessoas com deficiência</label>
            </div>
            <div>
                <input type="checkbox" id="pessoas-sofrimento" name="acao-cultural"
                    value="Pessoas em sofrimento físico e/ou psíquico">
                <label for="pessoas-sofrimento">Pessoas em sofrimento físico e/ou psíquico</label>
            </div>
            <div>
                <input type="checkbox" id="mulheres" name="acao-cultural" value="Mulheres">
                <label for="mulheres">Mulheres</label>
            </div>
            <div>
                <input type="checkbox" id="comunidade-lgbtqiap" name="acao-cultural" value="Comunidade LGBTQIAP+">
                <label for="com unidade-lgbtqiap">Comunidade LGBTQIAP+</label>
            </div>
            <div>
                <input type="checkbox" id="povos-comunidades-tradicionais" name="acao-cultural"
                    value="Povos e comunidades tradicionais">
                <label for="povos-comunidades-tradicionais">Povos e comunidades tradicionais</label>
            </div>
            <div>
                <input type="checkbox" id="negros-negras" name="acao-cultural" value="Negros e/ou negras">
                <label for="negros-negras">Negros e/ou negras</label>
            </div>
            <div>
                <input type="checkbox" id="ciganos" name="acao-cultural" value="Ciganos">
                <label for="ciganos">Ciganos</label>
            </div>
            <div>
                <input type="checkbox" id="indigenas" name="acao-cultural" value="Indígenas">
                <label for="indigenas">Indígenas</label>
            </div>
            <div>
                <input type="checkbox" id="aberta-todas" name="acao-cultural" value="Aberta para todas">
                <label for="aberta-todas">Aberta para todas</label>
            </div>
            <div>
                <input type="checkbox" id="outros" name="acao-cultural" value="Outros">
                <label for="outros">Outros</label>
            </div>
        </div>
        <div>
            <label for="medidas-acessibilidade">Medidas de acessibilidade empregadas no projeto:</label>
            <textarea id="medidas-acessibilidade" name="medidas-acessibilidade"></textarea>
        </div>
        <div>
            <label for="acessibilidade-comunicacional">Acessibilidade comunicacional:</label>
            <div>
                <input type="checkbox" id="libras" name="acessibilidade-comunicacional"
                    value="A Língua Brasileira de Sinais - Libras">
                <label for="libras">A Língua Brasileira de Sinais - Libras</label>
            </div>
            <div>
                <input type="checkbox" id="braille" name="acessibilidade-comunicacional" value="O Sistema Braille">
                <label for="braille">O Sistema Braille</label>
            </div>
            <div>
                <input type="checkbox" id="sinalizacao-tatil" name="acessibilidade-comunicacional"
                    value="O Sistema de sinalização ou comunicação tátil">
                <label for="sinalizacao-tatil">O Sistema de sinalização ou comunicação tátil</label>
            </div>
            <div>
                <input type="checkbox" id="audiodescricao" name="acessibilidade-comunicacional"
                    value="A Audiodescrição">
                <label for="audiodescricao">A Audiodescrição</label>
            </div>
            <div>
                <input type="checkbox" id="legendas" name="acessibilidade-comunicacional" value="As Legendas">
                <label for="legendas">As Legendas</label>
            </div>
            <div>
                <input type="checkbox" id="traducao-simultanea" name="acessibilidade-comunicacional"
                    value="A Tradução simultânea">
                <label for="traducao-simultanea">A Tradução simultânea</label>
            </div>
            <div>
                <input type="checkbox" id="traducao-simultanea-libras" name="acessibilidade-comunicacional"
                    value="A Tradução simultânea em Libras">
                <label for="traducao-simultanea-libras">A Tradução simultânea em Libras</label>
            </div>
            <div>

                <div>
                    <label for="medidas-acessibilidade">Medidas de acessibilidade empregadas no projeto:</label>
                    <textarea id="medidas-acessibilidade" name="medidas-acessibilidade"></textarea>
                </div>
                <div>
                    <label for="implementacao-acessibilidade">Informe como essas medidas de acessibilidade serão
                        implementadas ou disponibilizadas de acordo com o projeto proposto:</label>
                    <textarea id="implementacao-acessibilidade" name="implementacao-acessibilidade"></textarea>
                </div>
                <div>
                    <label for="local-execucao">Local onde o projeto será executado:</label>
                    <textarea id="local-execucao" name="local-execucao"></textarea>
                </div>
                <div>
                    <label for="data-inicio">Data de Início:</label>
                    <input type="date" id="data-inicio" name="data-inicio">
                </div>
                <div>
                    <label for="data-final">Data Final:</label>
                    <input type="date" id="data-final" name="data-final">
                </div>
                <div>
                    <label for="estrategia-divulgacao">Estratégia de divulgação:</label>
                    <textarea id="estrategia-divulgacao" name="estrategia-divulgacao"></textarea>
                </div>
                <div>
                    <label for="contrapartida">Contrapartida:</label>
                    <textarea id="contrapartida" name="contrapartida"></textarea>
                </div>
                <div>
                    <label for="recursos-financeiros">Projeto possui recursos financeiros de outras fontes? Se sim,
                        quais?</label>
                    <div>
                        <input type="radio" id="nao-possui-recursos" name="recursos-financeiros"
                            value="Não, o projeto não possui outras fontes de recursos financeiros">
                        <label for="nao-possui-recursos">Não, o projeto não possui outras fontes de recursos
                            financeiros</label>
                    </div>
                    <div>
                        <input type="radio" id="apoio-municipal" name="recursos-financeiros"
                            value="Apoio financeiro municipal">
                        <label for="apoio-municipal">Apoio financeiro municipal</label>
                    </div>
                    <div>
                        <input type="radio" id="apoio-estadual" name="recursos-financeiros"
                            value="Apoio financeiro estadual">
                        <label for="apoio-estadual">Apoio financeiro estadual</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-municipal" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Municipal">
                        <label for="recursos-lei-incentivo-municipal">Recursos de Lei de Incentivo Municipal</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-estadual" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Estadual">
                        <label for="recursos-lei-incentivo-estadual">Recursos de Lei de Incentivo Estadual</label>
                    </div>
                    <div>
                        <input type="radio" id="recursos-lei-incentivo-federal" name="recursos-financeiros"
                            value="Recursos de Lei de Incentivo Federal">
                        <label for="recursos-lei-incentivo-federal">Recursos de Lei de Incentivo Federal</label>
                    </div>
                    <div>
                        <input type="radio" id="patrocinio-privado" name="recursos-financeiros"
                            value="Patrocínio privado direto">
                        <label for="patrocinio-privado">Patrocínio privado direto</label>
                    </div>
                    <div>
                        <input type="radio" id="patrocinio-instituicao-internacional" name="recursos-financeiros"
                            value="Patrocínio de instituição internacional">
                        <label for="patrocinio-instituicao-internacional">Patrocínio de instituição
                            internacional</label>
                    </div>
                    <div>
                        <input type="radio" id="doacoes-pessoas-fisicas" name="recursos-financeiros"
                            value="Doações de Pessoas Físicas">
                        <label for="doacoes-pessoas-fisicas">Doações de Pessoas Físicas</label>
                    </div>
                    <div>
                        <input type="radio" id="doacoes-empresas" name="recursos-financeiros"
                            value="Doações de Empresas">
                        <label for="doacoes-empresas">Doações de Empresas</label>
                    </div>
                    <div>
                        <input type="radio" id="cobranca-ingressos" name="recursos-financeiros"
                            value="Cobrança de ingressos">
                        <label for="cobranca-ingressos">Cobrança de ingressos</label>
                    </div>
                    <div>
                        <input type="radio" id="outros" name="recursos-financeiros" value="Outros">
                        <label for="outros">Outros</label>
                    </div>
                </div>
                <div>
                    <label for="detalhe-recursos">Se o projeto tem outras fontes de financiamento, detalhe quais são, o
                        valor do financiamento e onde os recursos serão empregados no projeto:</label>
                    <textarea id="detalhe-recursos" name="detalhe-recursos"></textarea>
                </div>
                <div>
                    <label for="venda-produtos-ingressos">O projeto prevê a venda de produtos/ingressos?</label>
                    <textarea id="venda-produtos-ingressos" name="venda-produtos-ingressos"></textarea>
                </div>
                <div>
                    <label for="parametros-orcamentarios">Indicar que parâmetros foram utilizados para identificação dos
                        valores na planilha orçamentária:</label>
                    <textarea id="parametros-orcamentarios" name="parametros-orcamentarios"></textarea>
                </div>
                <div class="mt-3">
                    <a href="editalParte1.php" class="btn btn-primary">Parte Um</a>
                    <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                    <a href="editalParte3.php" class="btn btn-primary">Parte Três</a>
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