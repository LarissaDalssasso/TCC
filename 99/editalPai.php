<?php
session_start();

$conn = mysqli_connect("localhost", "root", "root", "site");

// Definindo o ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verificar se o edital foi salvo
if (isset($_SESSION['edital_salvo']) && $_SESSION['edital_salvo'] === true) {
    echo "<script>alert('O edital foi salvo com sucesso!');</script>";
    unset($_SESSION['edital_salvo']); // Remove a variável de sessão após exibir o pop-up
}

$sql = "SELECT p1.id, p1.nome_fantasia, p1.representante_social, p2.nome_projeto, p2.descricao_projeto, p3.anexos 
        FROM editalParte1 p1 
        LEFT JOIN editalParte2 p2 ON p1.id = p2.id 
        LEFT JOIN editalParte3 p3 ON p1.id = p3.id 
        ORDER BY p1.id DESC";
$result = mysqli_query($conn, $sql);

// Lógica para excluir um edital
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);

    // Excluir da tabela editalParte1 (e outras partes se necessário)
    $sqlDelete1 = "DELETE FROM editalParte1 WHERE id = ?";
    $stmt1 = $conn->prepare($sqlDelete1);
    $stmt1->bind_param("i", $delete_id);
    $stmt1->execute();

    $sqlDelete2 = "DELETE FROM editalParte2 WHERE id = ?";
    $stmt2 = $conn->prepare($sqlDelete2);
    $stmt2->bind_param("i", $delete_id);
    $stmt2->execute();

    $sqlDelete3 = "DELETE FROM editalParte3 WHERE id = ?";
    $stmt3 = $conn->prepare($sqlDelete3);
    $stmt3->bind_param("i", $delete_id);
    $stmt3->execute();

    // Fechar as declarações
    $stmt1->close();
    $stmt2->close();
    $stmt3->close();

    // Redirecionar ou mostrar mensagem de sucesso
    header("Location: editalPai.php?success=1"); // Redireciona após exclusão
    exit();
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
<style>
    .table-primary {
        --bs-table-color: #212529;
        ;
        --bs-table-bg: #ebf0eb;
        --bs-table-border-color: #011b01be;
        ;
        --bs-table-striped-bg: #011b01be;
        ;
        --bs-table-striped-color: #011b01be;
        ;
        --bs-table-active-bg: #011b01be;
        ;
        --bs-table-active-color: #011b01be;
        ;
        --bs-table-hover-bg: #011b01be;
        ;
        --bs-table-hover-color: #011b01be;

        color: var(--bs-table-color);
        border-color: var(--bs-table-border-color)
    }

    .hidden {
        display: none;
    }
</style>

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



    <header class="masthead"
        style="background-image: url('assets/img/hansa.png'); margin-bottom: -105px;padding-bottom: 106px;justify-content: center;align-items: center;justify-items: center;">
        <div class="container" style="align-items: center; margin: auto;justify-content: center;">
            <div class="row" style="padding-right: 0px;margin: auto;">
                <div class="col-10 col-md-10 col-lg-8 col-xl-10 mx-auto position-relative">
                    <div class="site-heading">
                        <h1 style="padding-top: 0px;margin-right: 0px;padding-right: 0px;margin-top: 70px;">
                            Editais</h1><span class="subheading" style="margin: auto;">Participe mais sobre sua
                            cidade</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div style="padding-right: 0px;">
        <svg class="waves" viewBox="0 22.25 125 40">
            <path id="gentle-wave" d="M-160 50c40 0 70-25 110-25s70 25 110 25 70-25 110-25 70 25 110 25v40h-440z"
                fill="#446442"></path>
        </svg>
    </div>

    <div class="col-lg-8 offset-lg-1 mx-auto" style="padding-top: 8px;">
        <h3><span style="color: rgb(248, 248, 248);">Editais</span></h3>
        <p><span style="color: rgb(248, 248, 248);">Os editais de licitação são documentos que regulam o processo de
                contratação de bens, serviços e obras pela administração pública. Eles garantem transparência e
                competitividade, contendo informações sobre o objeto da licitação, condições de participação e critérios
                de julgamento. A divulgação do edital é fundamental para que todas as empresas interessadas possam
                participar de forma justa e igualitária.</span></p>
    </div>

    <div class="col-lg-8 offset-lg-1 mx-auto" style="padding-top: 8px;">
        <h3><span style="color: rgb(248, 248, 248);">Aplique seu edital</span></h3>
        <p><span style="color: rgb(248, 248, 248);">O edital é dividido em três partes, cada parte pode ser preenchida
                separadamente, a primeira parte é a Identificação da Pessoa, a segunda Planejamento e Organização e a
                última os Anexos.</span></p>
        <div class="editalBotao text-center">
            <a href="editalParte1.php" class="btn btn-primary" role="button"
                aria-label="Acessar edital da primeira parte">Edital Primeira parte</a>
            <a href="editalParte2.php" class="btn btn-primary" role="button"
                aria-label="Acessar edital da segunda parte">Edital Segunda parte</a>
            <a href="editalParte3.php" class="btn btn-primary" role="button"
                aria-label="Acessar edital da terceira parte">Edital Terceira parte</a>
        </div>


        <div class="container mt-5">
            <h3><span style="color: rgb(248, 248, 248);">Visualizar Editais Salvos</span> </h3>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">Edital excluído com sucesso!</div>
            <?php endif; ?>
            <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Fantasia</th>
                        <th>Representante Social</th>
                        <th>Nome do Projeto</th>
                        <th>Descrição do Projeto</th>
                        <th>Anexos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . htmlspecialchars($row['nome_fantasia']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['representante_social']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nome_projeto']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['descricao_projeto']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['anexos']) . "</td>";
                            echo "<td>";
                            echo "<a href='#' class='text-primary detalhes-link' data-id='" . $row['id'] . "' title='Ver detalhes'>
        <i class='fas fa-eye'></i>
      </a> ";
                            if (isset($_SESSION['papel']) && $_SESSION['papel'] === 'admin') {
                                echo "<a href='editalPai.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este edital?\");' class='text-danger'>
            <i class='fas fa-trash'></i>
          </a>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum edital encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="detalhesModal" tabindex="-1" aria-labelledby="detalhesModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detalhesModalLabel">Detalhes do Edital</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalContent">
                        <!-- O conteúdo do edital será carregado aqui via AJAX -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
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
        <script
            src="assets/js/Carousel-Multi-Image--ISA--carousel-multi.js?h=8b6a61c52462cb43846bf671a4118b63"></script>
        <script src="assets/js/clean-blog.js?h=44b1c6e85af97fda0fedbb834b3ff3f8"></script>
        <script src="assets/js/faq-xerius%20faq.js?h=1079596b8ac096fe203457b5fbbbb842"></script>
        <script
            src="assets/js/Fixed-navbar-starting-with-transparency-script.js?h=d3a58694022081474e39f06e40840737"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Quando um link de detalhes é clicado
                $('.detalhes-link').on('click', function () {
                    var editalId = $(this).data('id'); // Obtém o ID do edital

                    // Faz uma requisição AJAX para obter os detalhes
                    $.ajax({
                        url: 'detalhesEdital.php', // O arquivo que retorna os detalhes
                        type: 'GET',
                        data: { id: editalId },
                        success: function (response) {
                            // Carrega a resposta no modal
                            $('#modalContent').html(response);
                            $('#detalhesModal').modal('show'); // Exibe o modal
                            $('nav').addClass('hidden'); // Oculta a navegação
                        },
                        error: function () {
                            alert('Erro ao carregar os detalhes do edital.');
                        }
                    });
                });

                // Quando o modal é fechado
                $('#detalhesModal').on('hidden.bs.modal', function () {
                    $('nav').removeClass('hidden'); // Mostra a navegação novamente
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const modal = document.getElementById('detalhesModal');

                modal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget; // Botão que acionou o modal
                    const nomeFantasia = button.getAttribute('data-nome-fantasia');
                    const representanteSocial = button.getAttribute('data-representante-social');
                    const nomeProjeto = button.getAttribute('data-nome-projeto');
                    const descricaoProjeto = button.getAttribute('data-descricao-projeto');
                    const anexos = button.getAttribute('data-anexos');

                    // Atualizar o conteúdo do modal
                    modal.querySelector('#detalheNomeFantasia').textContent = nomeFantasia;
                    modal.querySelector('#detalheRepresentanteSocial').textContent = representanteSocial;
                    modal.querySelector('#detalheNomeProjeto').textContent = nomeProjeto;
                    modal.querySelector('#detalheDescricaoProjeto').textContent = descricaoProjeto;
                    modal.querySelector('#detalheAnexos').textContent = anexos;
                });
            });

            // Função para carregar detalhes do edital
            function carregarDetalhesEdital(id) {
                fetch(`detalhesEdital.php?id=${id}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                        } else {
                            // Atualiza o modal com os dados recebidos
                            document.getElementById('detalheNomeFantasia').textContent = data.nome_fantasia;
                            document.getElementById('detalheRepresentanteSocial').textContent = data.representante_social;
                            document.getElementById('detalheNomeProjeto').textContent = data.nome_projeto;
                            document.getElementById('detalheDescricaoProjeto').textContent = data.descricao_projeto;
                            document.getElementById('detalheAnexos').textContent = data.anexos;
                            // Abre o modal
                            $('#detalhesModal').modal('show');
                        }
                    })
                    .catch(error => console.error('Erro ao carregar detalhes do edital:', error));
            }
        </script>
</body>

</html>