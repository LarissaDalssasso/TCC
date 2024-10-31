<?php session_start(); ?> 
<!DOCTYPE html>
<html data-bs-theme="light" lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Eventos</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=c024d0d0e453eded01a716413c455157" />
  <link rel="stylesheet" href="assets/css/Cardo.css?h=54435dcaa177a916e3e63e7316171ab2" />
  <link rel="stylesheet" href="assets/css/Lora.css?h=bdaf7c1de0b3e7a16798adea8d3dbc2d" />
  <link rel="stylesheet" href="assets/css/Open%20Sans.css?h=2d3c3a91eeecc10761e0f42a138ac3d0" />
  <link rel="stylesheet" href="assets/css/Roboto.css?h=2d6bd1b3be64e0434121413c7c62d43a" />
  <link rel="stylesheet" href="assets/css/accordion-faq-list.css?h=03017b5fe5da3d3fd1f6bdfafaec34cf" />
  <link rel="stylesheet" href="assets/css/Articles-Cards-images.css?h=da4d1cf3be712304717573ab3cf0bbe3" />
  <link rel="stylesheet" href="assets/css/Carousel-Multi-Image--ISA-.css?h=3a42df1cc3eaeb061a294987537c4cee" />
  <link rel="stylesheet" href="assets/css/Corporate-Footer-Clean.css?h=d441d77de4880d53c739b4a52a593159" />
  <link rel="stylesheet" href="assets/css/faq.css?h=12592fb6d6bd9a3e0e5e469de7b4b7d2" />
  <link rel="stylesheet" href="assets/css/faq.compiled.css?h=1688e06fc52004af4926270c96a0bef7" />
  <link rel="stylesheet" href="assets/css/Footer-Dark-Multi-Column-icons.css?h=befd8a398792e305b7ffd4a176b5b585" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
  <link rel="stylesheet" href="assets/css/Masonry-gallery-cards-responsive.css?h=179c54b3d671ef8d56e046cb9cffb0bd" />
  <link rel="stylesheet" href="assets/css/News-Cards-1.css?h=19de63894dd5898d7874581c81f61f35" />
  <link rel="stylesheet" href="assets/css/News-Cards.css?h=f5670ae41835ad3f2c29fb53f9cfb93f" />
  <link rel="stylesheet" href="assets/css/untitled.css?h=c4a4fb8d4b04afd37d06542391175254" />
  <link rel="stylesheet" href="assets/css/Waves---DentalTech.css?h=628c01a359dbc6e2de829e0469c6b52e" />
  <link rel="stylesheet" href="assets/css/form.css?h=193234bc42a8caa5a234be2173f3e1d6" />
  <link rel="stylesheet" href="assets/css/formatacao.css?h=44bd75216289d00ac8c938eccbd9b67b" />
  <link rel="stylesheet" href="assets/css/espacamentos.css?h=f982ad878b86b64ed6ecf5b558b6f5f3" />
  <link rel="stylesheet"
    href="assets/css/Fixed-navbar-starting-with-transparency-styles.css?h=7587f1df9059ad49d5a6efd0bdf71cbf" />
  <link rel="stylesheet"
    href="assets/css/Fixed-navbar-starting-with-transparency-colors.css?h=cee0ab111828e10642ce8354c9a00ffe" />
  <link rel="stylesheet" href="assets/css/dh-card-image-left-dark.css?h=fbeb7871206b72100c90953ca6cc43cc" />
  <link rel="stylesheet" href="assets/css/Login-screen.css?h=a83d532a2ddb77352016bff7774f7e85" />
  <link rel="stylesheet" href="assets/css/Navigation-Menu.css?h=587a88704dc45b107523dd7422062369" />
  <link rel="stylesheet" href="index.css" />
</head>

<body style="padding-right: 10px"> <nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light"
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

  <header class="masthead" style="background-color: #446442; display: flex; justify-content: center"">
      <div class=" container">
    <div class="row">
      <div class="col-md-10 col-lg-8 mx-auto position-relative">
        <div class="site-heading" style="
                padding-bottom: 0px;
                margin-bottom: 0px;
                padding-top: 0px;
                margin-top: 84px;
              ">
          <h1 style="font-size: 45px">
            Festival da Canção de Ibirama retorna na programação do
            Weihnachtsmarkt
          </h1>
          <span class="subheading">1 de novembro</span>
        </div>
      </div>
    </div>
    </div>
    <!-- Start: Fixed navbar starting with transparency -->

  </header>
  <div class="col-lg-8 col-xl-8 offset-lg-1 mx-auto" style="padding-top: 8px">
    <p>
      <span style="color: rgb(255, 255, 255)">Tudo começa com uma ideia. Talvez você queira abrir um negócio.
        Talvez você queira transformar um passatempo em algo mais sério. Ou
        talvez você tenha um projeto criativo para divulgar ao mundo. Seja o
        que for, o modo de contar sua história on-line faz toda a
        diferença.</span>
    </p>
    <p>
      <span style="color: rgb(255, 255, 255)">Não se preocupe em parecer profissional. Seja você mesmo. Existem
        mais de 1,5 bilhão de sites, mas a sua história é o diferencial que
        separa você dos outros. Se você ler as palavras em voz alta e não se
        sentir identificado, isso significa que o texto ainda precisa ser
        trabalhado.</span>
    </p>
    <p>
      <span style="color: rgb(255, 255, 255)">Seja claro, tenha confiança e não pense demais. O melhor da sua
        história é que ela vai continuar evoluindo, e o site pode acompanhar
        essa evolução. Seu objetivo deve ser fazer com que ele seja ideal para
        este momento. Depois, ele vai se ajustando sozinho. É sempre
        assim.</span>
    </p>
  </div>
  <div class="row">
    <div class="col">
      <div class="col" style="
              padding-left: auto;
              margin-right: auto;
              padding-right: auto;
              margin-left: auto;
              justify-content: center;
            ">
        >
        <div style="
                margin: auto;
                padding: auto;
                display: flex;
                justify-content: center;
              ">
          <img class="imE" width="290" height="240"
            src="assets/img/musicCult2.jpg?h=70dacdb5a7bee62c2ae1569f2cc22005" /><img class="imE" width="288"
            height="232" src="assets/img/musicCult3.jpg?h=ee5420cce55c21ac6c19f51cb80262f3" /><img class="imE"
            width="270" height="248" src="assets/img/musicCult4.jpg?h=d55032edb96e07ecca5355e80001f0d8" />
        </div>
      </div>
    </div>
    <div>
      <div class="col">
        <!-- Start: Back-Next Nav -->
        <a class="btn btn-outline-primary float-end" role="button" onclick="window.location.href='Evento4.php'" style="
          color: #ffffff;
          border: none;
          margin-top: 0px;
          padding-bottom: 0px;
          margin-bottom: 0px;
          padding-right: 0px;
          margin-right: 41px;
          padding-top: 0px;
          padding-left: 0px;
          margin-left: auto;
        "><strong>Ibirama abre período de inscrições de projetos na Lei Paulo Gustavo
            -&gt;</strong></a>
      </div>
      <!-- End: Back-Next Nav -->
    </div>
  </div>
  <!-- Start: Footer Dark -->


  <footer class="text-center" style="padding-bottom: 0px; padding-top: 0px; display: flex; justify-content: center">
    <div class="container text-white py-4 py-lg-5" style="
    margin-bottom: -36px;
    padding-bottom: 109px;
    padding-top: 12px;
    margin-top: -99px;
    margin: auto;
  
  ">
      <ul class="list-inline" style="padding-left: 0px">
        <li class="list-inline-item me-4">
          <a class="link-light" href="#">Larissa Dalssasso</a>
        </li>
        <li class="list-inline-item me-4">
          <a class="link-light" href="#">&amp;</a>
        </li>
        <li class="list-inline-item">
          <a class="link-light" href="#">Kauã Felippe</a>
        </li>
      </ul>
      <ul class="list-inline" style="padding-left: 0px">
        <li class="list-inline-item me-4">
          <a class="link-light" href="#"></a>
        </li>
        <li class="list-inline-item me-4">
          <a class="link-light" href="#">Instituto Federal Catarinense - Campus Ibirama</a>
        </li>
        <li class="list-inline-item"></li>
      </ul>
      <p class="text-muted mb-0" style="padding-left: 0px">
        Copyright © 2024 FECT
      </p>
    </div>
  </footer>
  <!-- End: Footer Dark -->
  <script src="assets/bootstrap/js/bootstrap.min.js?h=e55bde7d6e36ebf17ba0b8c1e80e4065"></script>
  <script src="assets/js/Carousel-Multi-Image--ISA--carousel-multi.js?h=8b6a61c52462cb43846bf671a4118b63"></script>
  <script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
  <script src="assets/js/faq-xerius%20faq.js?h=1079596b8ac096fe203457b5fbbbb842"></script>
  <script src="assets/js/Fixed-navbar-starting-with-transparency-script.js?h=d3a58694022081474e39f06e40840737"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>