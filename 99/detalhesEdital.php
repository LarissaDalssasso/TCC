<?php
session_start();
$conn = mysqli_connect("localhost", "root", "root", "site");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT p1.*, p2.*, p3.*, p2.data_inicio, p2.objetivo
    FROM editalParte1 p1 
    LEFT JOIN editalParte2 p2 ON p1.id = p2.id
    LEFT JOIN editalParte3 p3 ON p1.id = p3.id 

    WHERE p1.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $edital = $result->fetch_assoc();
    } else {
        echo "Edital não encontrado.";
        exit;
    }
} else {
    echo "ID do edital não fornecido.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edital</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="assets/css/Cardo.css?h=54435dcaa177a916e3e63e7316171ab2">
    <link rel="stylesheet" href="assets/css/Lora.css?h=8d0d5802b74a1ea44811aa3318e6cda4">
    <link rel="stylesheet" href="assets/css/Open%20Sans.css?h=9e213a74de5b277830c6eb6bd5f5862d">
    <link rel="stylesheet" href="assets/css/Roboto.css?h=26433eca780f70f93a970c5403b3ba8a">
    <link rel="stylesheet" href="assets/css/accordion-faq-list.css?h=03017b5fe5da3d3fd1f6bdfafaec34cf">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css?h=da4d1cf3be712304717573ab3cf0bbe3">
    <link rel="stylesheet" href="assets/css/Carousel-Multi-Image--ISA-.css?h=3a42df1cc3eaeb061a294987537c4 cee">
    <link rel="stylesheet" href="assets/css/Corporate-Footer-Clean.css?h=d441d77de4880d53c739b4a52a593159">
    <link rel="stylesheet" href="assets/css/faq.css?h=12592fb6d6bd9a3e0e5e469de7b4b7d2">
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
    <link rel="stylesheet" href="index.css">



</head>

<body>


   



    <div class="container">
        <h1>Detalhes do Edital</h1>
        <h2><?php echo htmlspecialchars($edital['nome_projeto']); ?></h2>
        <p><strong>Nome Fantasia:</strong> <?php echo htmlspecialchars($edital['nome_fantasia']); ?></p>
        <p><strong>Representante Social:</strong> <?php echo htmlspecialchars($edital['representante_social']); ?></p>
        <p><strong>Descrição do Projeto:</strong> <?php echo nl2br(htmlspecialchars($edital['descricao_projeto'])); ?>
        </p>

        <h3>Anexos</h3>
        <ul>
            <?php
            // Supondo que você tenha os caminhos dos arquivos armazenados em um campo
            $anexos = explode(',', $edital['anexos']); // Ajuste conforme sua lógica de armazenamento
            foreach ($anexos as $anexo) {
                echo "<li><a href='uploads/" . htmlspecialchars($anexo) . "' target='_blank'>" . htmlspecialchars($anexo) . "</a></li>";
            }
            ?>
        </ul>

        <h3>Informações Adicionais</h3>
        <p><strong>Data de Criação:</strong> <?php echo htmlspecialchars($edital['data_inicio']); ?></p>
        <p><strong>Data de Finalização:</strong> <?php echo htmlspecialchars($edital['data_final']); ?></p>

        <p><strong>Objetivos:</strong> <?php echo htmlspecialchars($edital['objetivo']); ?></p>

    </div>

    <footer class="text-center"
        style="margin-left:auto;justify-content: center; margin-right: auto; padding-bottom: 0px;padding-top: 0px; align-items: center;">
        <div class="container text-white py-4 py-lg-5" style="padding: auto;margin: auto;">
            <ul class="list-inline" style="padding-left: 0px;">
                <li class="list-inline-item me-4"><a class="link-light" href="#">Larissa Dalssasso</a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">&amp;</a></li>
                <li class="list-inline-item"><a class="link-light" href="#">Kauã Felippe</a></li>
            </ul>
            <ul class="list-inline" style="padding-left: 0px;">
                <li class="list-inline-item me-4"><a class="link-light" href="#"></a></li>
                <li class="list-inline-item me-4"><a class="link-light" href="#">Instituto Federal Catarinense -
                        Campus Ibirama</a></li>
                <li class="list-inline-item"></li>
            </ul>
            <p class="text-muted mb-0" style="padding-left: 0px;">Copyright © 2024 FECT</p>
        </div>
    </footer><!-- End: Footer Dark -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/bootstrap/js/bootstrap.min.js?h=e55bde7d6e36ebf17ba0b8c1e80e4065"></script>
    <script src="assets/js/Carousel-Multi-Image--ISA--carousel-multi.js?h=8b6a61c52462cb43846bf671a4118b63"></script>
    <script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
    <script src="assets/js/faq-xerius%20faq.js?h=1079596b8ac096fe203457b5fbbbb842"></script>
    <script
        src="assets/js/Fixed-navbar-starting-with-transparency-script.js?h=d3a58694022081474e39f06e40840737"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>

</html>