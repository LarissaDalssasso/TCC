<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "root", "site");

// Verificar conexão
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

// Inserir dados em editalParte1
$stmt = mysqli_prepare($conn, "INSERT INTO editalParte1 (identificacao, representante_social, nome_fantasia, cnpj, endereco, rua, numero, cidade, estado, cep, representante_legal, cargo, cpf, rg, endereco_representante, rua_representante, numero_representante, cidade_representante, estado_representante, cep_representante, telefone, genero, raca, deficiencia, tipo_deficiencia, escolaridade, curriculo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Erro ao preparar a instrução SQL: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssss", 
    $_POST['identificacao'], 
    $_POST['representante_social'], 
    $_POST['nome_fantasia'], 
    $_POST['cnpj'], 
    $_POST['endereco'], 
    $_POST['rua'], 
    $_POST['numero'], 
    $_POST['cidade'], 
    $_POST['estado'], 
    $_POST['cep'], 
    $_POST['representante_legal'], 
    $_POST['cargo'], 
    $_POST['cpf'], 
    $_POST['rg'], 
    $_POST['endereco_representante'], 
    $_POST['rua_representante'], 
    $_POST['numero_representante'], 
    $_POST['cidade_representante'], 
    $_POST['estado_representante'], 
    $_POST['cep_representante'], 
    $_POST['telefone'], 
    $_POST['genero'], 
    $_POST['raca'], 
    $_POST['deficiencia'], 
    $_POST['tipo_deficiencia'], 
    $_POST['escolaridade'], 
    $_POST['curriculo']);
if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao executar a instrução SQL: " . mysqli_stmt_error($stmt));
}

// Inserir dados em editalParte2
$stmt = mysqli_prepare($conn, "INSERT INTO editalParte2 (nome_projeto, categoria, descricao_projeto, objetivo, meta, publico, acao_cultural, medidas_acessibilidade, implementacao_acessibilidade, local_execucao, data_inicio, data_final, estrategia_divulgacao, contrapartida, recursos_financeiros, detalhe_recursos, venda_produtos_ingressos, parametros_orcamentarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Erro ao preparar a instrução SQL: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", 
    $_POST['nome_projeto'], 
    $_POST['categoria'], 
    $_POST['descricao_projeto'], 
    $_POST['objetivo'], 
    $_POST['meta'], 
    $_POST['publico'], 
    $_POST['acao_cultural'], 
    $_POST['medidas_acessibilidade'], 
    $_POST['implementacao_acessibilidade'], 
    $_POST['local_execucao'], 
    $_POST['data_inicio'], 
    $_POST['data_final'], 
    $_POST['estrategia_divulgacao'], 
    $_POST['contrapartida'], 
    $_POST['recursos_financeiros'], 
    $_POST['detalhe_recursos'], 
    $_POST['venda_produtos_ingressos'], 
    $_POST['parametros_orcamentarios']);
if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao executar a instrução SQL: " . mysqli_stmt_error($stmt));
}

// Inserir dados em editalParte3
$stmt = mysqli_prepare($conn, "INSERT INTO editalParte3 (anexos, estatuto_social, ata_eleicao_pose, documento_pessoal_dirigente, comprovante_residencia_dirigente, declaracoes_gerais, certificado_condicao_microempreendedor, cnpj_ativo, documento_pessoal_socio, comprovante_residencia_socio, declaracoes_gerais_socio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Erro ao preparar a instrução SQL: " . mysqli_error($conn));
}
mysqli_stmt_bind_param($stmt, "sssssssssss", 
    $_POST['anexos'], 
    $_POST['estatuto_social'], 
    $_POST['ata_eleicao_pose'], 
    $_POST['documento_pessoal_dirigente'], 
    $_POST['comprovante_residencia_dirigente'], 
    $_POST['declaracoes_gerais'], 
    $_POST['certificado_condicao_microempreendedor'], 
    $_POST['cnpj_ativo'], 
    $_POST['documento_pessoal_socio'], 
    $_POST['comprovante_residencia_socio'], 
    $_POST['declaracoes_gerais_socio']);
if (!mysqli_stmt_execute($stmt)) {
    die("Erro ao executar a instrução SQL: " . mysqli_stmt_error($stmt));
}

// Fechar conexão
mysqli_close($conn);
