<?php
session_start(); // Inicia a sessão, se não estiver iniciada

// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "root", "site");

// Verificar conexão
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Iniciar uma transação
mysqli_begin_transaction($conn);

try {
    // Inserir dados em editalParte1
    $stmt = mysqli_prepare($conn, "INSERT INTO editalParte1 (identificacao, representante_social, nome_fantasia, cnpj, endereco, rua, numero, cidade, estado, cep, representante_legal, cargo, cpf, rg, endereco_representante, rua_representante, numero_representante, cidade_representante, estado_representante, cep_representante, telefone, genero, raca, deficiencia, tipo_deficiencia, escolaridade, curriculo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception("Erro ao preparar a instrução SQL para editalParte1: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssssssssssssssssss",
        $_POST['identificacao'],
        $_POST['representante-social'],
        $_POST['nome-fantasia'],
        $_POST['cnpj'],
        $_POST['endereco'],
        $_POST['rua'],
        $_POST['numero'],
        $_POST['cidade'],
        $_POST['estado'],
        $_POST['cep'],
        $_POST['representante-legal'],
        $_POST['cargo'],
        $_POST['cpf'],
        $_POST['rg'],
        $_POST['endereco-representante'],
        $_POST['rua-representante'],
        $_POST['numero-representante'],
        $_POST['cidade-representante'],
        $_POST['estado-representante'],
        $_POST['cep-representante'],
        $_POST['telefone'],
        $_POST['genero'],
        $_POST['raca'],
        $_POST['deficiencia'],
        $_POST['tipo-deficiencia'],
        $_POST['escolaridade'],
        $_POST['curriculo']
    );

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao executar a instrução SQL para editalParte1: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);

    // Inserir dados em editalParte2
    $stmt = mysqli_prepare($conn, "INSERT INTO editalParte2 (nome_projeto, categoria, descricao_projeto, objetivo, meta, publico, acao_cultural, medidas_acessibilidade, implementacao_acessibilidade, local_execucao, data_inicio, data_final, estrategia_divulgacao, contrapartida, recursos_financeiros, detalhe_recursos, venda_produtos_ingressos, parametros_orcamentarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception("Erro ao preparar a instrução SQL para editalParte2: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssssssssss",
        $_POST['nome-projeto'],
        $_POST['categoria'],
        $_POST['descricao-projeto'],
        $_POST['objetivo'],
        $_POST['meta'],
        $_POST['publico'],
        $_POST['acao-cultural'],
        $_POST['medidas-acessibilidade'],
        $_POST['implementacao-acessibilidade'],
        $_POST['local-execucao'],
        $_POST['data-inicio'],
        $_POST['data-final'],
        $_POST['estrategia-divulgacao'],
        $_POST['contrapartida'],
        $_POST['recursos-financeiros'],
        $_POST['detalhe-recursos'],
        $_POST['venda-produtos_ingressos'],
        $_POST['parametros-orcamentarios']
    );

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao executar a instrução SQL para editalParte2: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
    // Inserir dados em editalParte3
    $stmt = mysqli_prepare($conn, "INSERT INTO editalParte3 (anexos, estatuto_social, ata_eleicao_pose, documento_pessoal_dirigente, comprovante_residencia_dirigente, declaracoes_gerais, certificado_condicao_microempreendedor, cnpj_ativo, documento_pessoal_socio, comprovante_residencia_socio, declaracoes_gerais_socio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception("Erro ao preparar a instrução SQL para editalParte3: " . mysqli_error($conn));
    }mysqli_stmt_bind_param(
        $stmt,
        "sssssssssss",
        $_POST['anexos'],
        $_POST['estatuto-social'],
        $_POST['ata-eleicao-pose'], // Corrigido
        $_POST['documento-pessoal_dirigente'],
        $_POST['comprovante-residencia_dirigente'],
        $_POST['declaracoes-gerais'],
        $_POST['certificado-condicao_microempreendedor'],
        $_POST['cnpj-ativo'],
        $_POST['documento-pessoal-socio'],
        $_POST['comprovante-residencia-socio'],
        $_POST['declaracoes-gerais-socio']
    );

    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erro ao executar a instrução SQL para editalParte3: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);

    // Se tudo deu certo, comitar a transação
    mysqli_commit($conn);
    $_SESSION['nome_projeto'] = $_POST['nome-projeto'];

    $_SESSION['edital_salvo'] = true; // Define a variável de sessão
    header('Location: editalPai.php');
    exit();
} catch (Exception $e) {
    // Se houver algum erro, fazer rollback e mostrar a mensagem de erro
    mysqli_rollback($conn);
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão
mysqli_close($conn);
