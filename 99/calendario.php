<?php
session_start();
include './cadastro/config.php';

$currentMonth = date('m');
$currentYear = date('Y');

if (isset($_GET['month']) && isset($_GET['year'])) {
    $currentMonth = intval($_GET['month']);
    $currentYear = intval($_GET['year']);
}

// Verifique se o mês está fora do intervalo e ajuste o ano se necessário
if ($currentMonth < 1) {
    $currentMonth = 12;
    $currentYear--;
} elseif ($currentMonth > 12) {
    $currentMonth = 1;
    $currentYear++;
}

// Array com os nomes dos meses em português
$meses = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
];

// Obter o nome do mês atual em português
$monthName = $meses[$currentMonth];

$firstDayOfMonth = strtotime("$currentYear-$currentMonth-01");
$daysInMonth = date('t', $firstDayOfMonth);
$events = [];

// Buscar eventos do mês atual
$sql = "SELECT * FROM eventos WHERE MONTH(data) = ? AND YEAR(data) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $currentMonth, $currentYear);
$stmt->execute();
$result = $stmt->get_result();

while ($event = $result->fetch_assoc()) {
    $events[date('j', strtotime($event['data']))][] = $event;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Eventos</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="calendario.css">

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/formatacao.css?h=44bd75216289d00ac8c938eccbd9b67b">
    <link rel="stylesheet" href="assets/css/espacamentos.css?h=f982ad878b86b64ed6ecf5b558b6f5f3">
    <link rel="stylesheet"
        href="assets/css/Fixed-navbar-starting-with-transparency-styles.css?h=7587f1df9059ad49d5a6efd0bdf71cbf">
    <link rel="stylesheet"
        href="assets/css/Fixed-navbar-starting-with-transparency-colors.css?h=cee0ab111828e10642ce8354c9a00ffe">
    <link rel="stylesheet" href="assets/css/dh-card-image-left-dark.css?h=fbeb7871206b72100c90953ca6cc43cc">
    <link rel="stylesheet" href="assets/css/Login-screen.css?h=a83d532a2ddb77352016bff7774f7e85">
    <link rel="stylesheet" href="assets/css/Navigation-Menu.css?h=587a88704dc45b107523dd7422062369">

    <link rel="stylesheet" href="evento.css">
    <!-- Adicione outros links de estilo conforme necessário -->
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparency navbar-light" style="background-color: inherit;">
        <div class="container">
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <a class="navbar-brand" href="index.php"><strong><span
                            style="color: rgb(255, 255, 255);">FECT</span></strong></a>
                <ul class="navbar-nav ms-auto">
                    
                <li class="nav-item"><a class="nav-link" href="calendario.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CALENDÁRIO</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="cursos.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">CURSOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="editalPai.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EDITAL</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="cards.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8);">EVENTOS</span></strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="alas.php"><strong><span
                                    style="color: rgba(255, 255, 255, 0.8); ">ALAS</span></strong></a></li>

                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 16px; font-weight: bold; color: #fff;">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                            <a class="nav-link active" href="login.html"><strong><span
                                        style="color: rgb(255, 255, 255);">LOGIN</span></strong></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">


        <div class="d-flex justify-content-center align-items-center">
            <!-- Seta para o mês anterior -->
            <a href="?month=<?php echo $currentMonth - 1; ?>&year=<?php echo $currentYear; ?>" class="arrow-link">
                <i class="fas fa-chevron-left"></i>
            </a>

            <!-- Espaço para o título -->
            <h2 class="mx-3 pedro"><?php echo $monthName . " " . $currentYear; ?></h2>

            <!-- Seta para o próximo mês -->
            <a href="?month=<?php echo $currentMonth + 1; ?>&year=<?php echo $currentYear; ?>" class="arrow-link">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>

        <div class="calendar mt-4">
    <div class="row">
        <?php
        $daysOfWeek = ['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SÁB'];
        foreach ($daysOfWeek as $day) {
            echo "<div class='col text-center'><strong>$day</strong></div>";
        }
        ?>
    </div>

    <div class="row">
        <?php
        $firstDayOfWeek = date('w', $firstDayOfMonth);
        $totalCells = $firstDayOfWeek + $daysInMonth;
        $remainingCells = 7 - ($totalCells % 7);
        $totalGridCells = $totalCells + ($remainingCells % 7);

        for ($i = 0; $i < $totalGridCells; $i++) {
            if ($i < $firstDayOfWeek || $i >= ($firstDayOfWeek + $daysInMonth)) {
                // Células vazias
                echo "<div class='col'></div>";
            } else {
                // Dia do mês
                $day = $i - $firstDayOfWeek + 1;
                echo "<div class='col text-center'>";
                echo "<div class='day'>";
                echo "<span class='day-number'>$day</span>";

                // Mostrar eventos do dia
                if (isset($events[$day])) {
                    foreach ($events[$day] as $event) {
                        echo "<a class='event-link' href='detalhesEventos.php?id={$event['id']}'>{$event['titulo']}</a>";
                    }
                }

                echo "</div>"; // Fechando a div "day"
                echo "</div>";
            }
        }
        ?>
    </div>
</div>


    </div>
    </div>

    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>