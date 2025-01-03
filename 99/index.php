<?php session_start();
?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br" style="margin-top: -26px;margin-right: 0px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no;">
    <title>Menu</title>
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
    <link rel="stylesheet" href="assets/css/Waves---DentalTech.css">
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
    <style>
        .dropdown-menu {
            position: absolute;
            z-index: 1000;
        }
    </style>
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


    
    <header class="masthead"
        style="background-image: url('assets/img/hansa.png'); height: 100vh; background-size: cover; background-position: center; padding-bottom: 106px;justify-content: center;align-items: center;justify-items: center;">
        <div class="container" style="align-items: center; margin: auto;justify-content: center;">
            <div class="row" style="padding-right: 0px;margin: auto;">
                <div class="col-10 col-md-10 col-lg-8 col-xl-10 mx-auto position-relative">
                    <div class="site-heading">
                        <h1
                            style="padding-top: 0px;margin-right: 0px;padding-right: 0px;margin-top: 70px; color:#fffff;">
                            Fundação do Esporte,<br> Cultura e Turismo</h1><span class="subheading"
                            style="margin: auto;">Descubra mais sobre sua cidade</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start: waves -->

    <div style="margin-top: -100px;"> <!-- Ajuste para que as ondas fiquem visíveis -->
    <svg class="waves" viewBox="0 22.25 125 40">
        <path id="gentle-wave" d="M-160 50c40 0 70-25 110-25s70 25 110 25 70-25 110-25 70 25 110 25v40h-440z" fill="#446442"></path>
    </svg>
</div>
    <!-- End: waves -->
    <div class="col-lg-8 offset-lg-1 mx-auto" style="padding-top: 8px;">
        <h2><span style="color: rgb(248, 248, 248);">Cidade de Ibirama</span></h2>
        <p><span style="color: rgb(248, 248, 248);">Com pouco mais de 18 mil habitantes, Ibirama celebra o perfil de uma
                comunidade pacata, organizada e muito acolhedora. Situada junto à região catarinense do Alto Vale do
                Itajaí, tem a sua economia pautada por bons resultados nos setores da indústria, comércio, serviços e
                agropecuária.</span></p>
        <p><span style="color: rgb(248, 248, 248);">Fundada em 1897, ainda hoje seus moradores mantém as fortes
                características da colonização europeia. Grande parcela da população é descendente de alemães e
                italianos e faz questão de preservar a maioria dos costumes trazidos pelos antepassados.</span></p>
        <p><span style="color: rgb(248, 248, 248);">O município é de fácil acesso, estando estrategicamente localizado
                às margens da BR 470. Oferece boas condições logísticas na escoação de produtos, estando distante a
                cerca de 120 km do Porto de Itajaí e do Aeroporto de Navegantes, e dista somente 10 km do Aeroporto de
                Lontras.</span></p>
    </div>
    <div class="faq" style="margin-top: 70px;margin-bottom: -4px;padding-bottom: 119px;">
        <!-- Start: faq -->
        <div class="col-md-6 offset-md-3">
            <!-- Start: faq-1 -->
            <div id="faqlist" class="accordion accordion-flush">
                <div class="accordion-item"
                    style="margin-bottom: 10px;margin-right: 0px;background: #344b2e;border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;border: 1px solid;border-top-style: solid;border-top-color: #f8f8f7;border-right-style: solid;border-right-color: #f8f8f8;border-bottom-style: solid;border-bottom-color: #f8f8f8;border-left-style: solid;border-left-color: #f8f8f8;">
                    <details class="accordion">
                        <summary class="accordion__title">O que a Cultura oferece?<span></span></summary>
                        <article class="accordion__content">
                            A cultura oferece identidade, coesão social, expressão criativa, conhecimento e
                            entretenimento, conectando pessoas através de tradições, valores e experiências
                            compartilhadas. Ela enriquece a vida ao promover diversidade, inclusão e educação, enquanto
                            também proporciona espaços para lazer e reflexão.
                        </article>
                    </details>
                </div>
                <div style="margin-bottom: 10px;background: #344b2e;border-top-left-radius: 5px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px;border: 1px solid #c3c3c3;border-top-style: solid;border-top-color: #c3c3c3;border-right-style: solid;border-right-color: #c3c3c3;border-bottom-style: solid;border-bottom-color: #c3c3c3;border-left-style: solid;border-left-color: #c3c3c3"
                    class="accordion-item">
                    <details class="accordion">
                        <summary class="accordion__title">Maiores Eventos<span></span></summary>
                        <article class="accordion__content">
                            O evento de Natal é uma celebração marcada por momentos de união, alegria e solidariedade.
                            As decorações festivas, como luzes e árvores iluminadas, criam um clima especial de
                            confraternização. Durante esse período, as famílias e amigos se reúnem para trocar
                            presentes, compartilhar refeições e reforçar laços de afeto. Além disso, o Natal é uma época
                            de reflexão, onde se destacam valores como paz, amor e esperança, inspirando gestos de
                            generosidade e cuidado com o próximo.
                        </article>
                    </details>
                </div>
            </div><!-- End: faq-1 -->
        </div><!-- End: faq -->
    </div>

    <div class="section-border" data-controller="SectionDivider"
        style="clip-path: url(#section-divider-660bf7b409bb5d0127486a8f);" data-controllers-bound="SectionDivider">
        <div class="section-background">


            <div class="section-background-content" data-controller="BackgroundContours"
                data-controllers-bound="BackgroundContours">
                <div class="section-background-canvas background-fx-canvas" style="overflow: hidden;"><canvas
                        style="display: none; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;"
                        width="1512" height="1038"></canvas><canvas width="1512" height="1038"
                        style="position: absolute; left: 0px; top: 0px; width: 1210px; height: 831px;"></canvas></div>
            </div>


        </div>
    </div>


    <!-- Start: Footer Dark -->



    <footer class="text-center"
        style=" margin-left:auto;justify-content: center; margin-right: auto; padding-bottom: 0px;padding-top: 0px; align-items: center;">
        <div class="container text-white py-4 py-lg-5" style="padding: auto;margin: auto;">
            <ul class="list-inline" style="padding-left: 0px;">
                <li class="list-inline-item me-4"><a class="link-light" href="#">Larissa Dalssasso</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">&amp;</a></li>
                <li class="list-inline-item"><a class="link-light" href="#">Kauã Felippe</a></li>
            </ul>
            <ul class="list-inline" style="padding-left: 0px;">
                <li class="list-inline-item me-4"><a class="link-light" href="#"></a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">Instituto Federal Catarinense - Campus
                        Ibirama</a></li>
                <li class="list-inline-item"></li>
            </ul>
            <p class="text-muted mb-0" style="padding-left: 0px;">Copyright © 2024 FECT</p>
        </div>
    </footer><!-- End: Footer Dark -->
    <script src="assets/bootstrap/js/bootstrap.min.js?h=e55bde7d6e36ebf17ba0b8c1e80e4065"></script>
    <script src="assets/js/Carousel-Multi-Image--ISA--carousel-multi.js?h=8b6a61c52462cb43846bf671a4118b63"></script>
    <script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
    <script src="assets/js/faq-xerius%20faq.js?h=1079596b8ac096fe203457b5fbbbb842"></script>
    <script
        src="assets/js/Fixed-navbar-starting-with-transparency-script.js?h=d3a58694022081474e39f06e40840737"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>