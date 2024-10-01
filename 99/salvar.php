<?php

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "site";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$identificacao = $_POST["identificacao"] ?? "";
$representante_social = $_POST["representante-social"] ?? "";
$nome_fantasia = $_POST["nome-fantasia"] ?? "";
$cnpj = $_POST["cnpj"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$rua = $_POST["rua"] ?? "";
$numero = $_POST["numero"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";
$cep = $_POST["cep"] ?? "";
$representante_legal = $_POST["representante-legal"] ?? "";
$cargo = $_POST["cargo"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$rg = $_POST["rg"] ?? "";
$endereco_representante = $_POST["endereco-representante"] ?? "";
$rua_representante = $_POST["rua-representante"] ?? "";
$numero_representante = $_POST["numero-representante"] ?? "";
$cidade_representante = $_POST["cidade-representante"] ?? "";
$estado_representante = $_POST["estado-representante"] ?? "";
$cep_representante = $_POST["cep-representante"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$genero = $_POST["genero"] ?? "";
$raca = $_POST["raca"] ?? "";
$deficiencia = $_POST["deficiencia"] ?? "";
$tipo_deficiencia = $_POST["tipo-deficiencia"] ?? "";
$escolaridade = $_POST["escolaridade"] ?? "";
$curriculo = $_FILES["curriculo"]["name"] ?? "";
$nome_projeto = $_POST["nome-projeto"] ?? "";
$categoria = $_POST["categoria"] ?? "";
$descricao_projeto = $_POST["descricao-projeto"] ?? "";
$objetivo = $_POST["objetivo"] ?? "";
$meta = $_POST["meta"] ?? "";
$publico = $_POST["publico"] ?? "";
$acao_cultural = $_POST["acao-cultural"] ?? "";
$medidas_acessibilidade = $_POST["medidas-acessibilidade"] ?? "";
$implementacao_acessibilidade = $_POST["implementacao-acessibilidade"] ?? "";
$local_execucao = $_POST["local-execucao"] ?? "";
$data_inicio = $_POST["data-inicio"] ?? "";
$data_final = $_POST["data-final"] ?? "";
$estrategia_divulgacao = $_POST["estrategia-divulgacao"] ?? "";
$contrapartida = $_POST["contrapartida"] ?? "";
$recursos_financeiros = $_POST["recursos-financeiros"] ?? "";
$detalhe_recursos = $_POST["detalhe-recursos"] ?? "";
$venda_produtos_ingressos = $_POST["venda-produtos-ingressos"] ?? "";
$parametros_orcamentarios = $_POST["parametros-orcamentarios"] ?? "";
$anexos = $_FILES["anexos"]["name"] ?? "";
$estatuto_social = $_FILES["estatuto-social"]["name"] ?? "";
$ata_eleicao_pose = $_FILES["ata-eleicao-pose"]["name"] ?? "";
$documento_pessoal_dirigente = $_FILES["documento-pessoal-dirigente"]["name"] ?? "";
$comprovante_residencia_dirigente = $_FILES["comprovante-residencia-dirigente"]["name"] ?? "";
$declaracoes_gerais = $_FILES["declaracoes-gerais"]["name"] ?? "";
$certificado_condicao_microempreendedor = $_FILES["certificado-condicao-microempreendedor"]["name"] ?? "";
$cnpj_ativo = $_FILES["cnpj-ativo"]["name"] ?? "";
$documento_pessoal_socio = $_FILES["documento-pessoal-socio"]["name"] ?? "";
$comprovante_residencia_socio = $_FILES["comprovante-residencia-socio"]["name"] ?? "";
$declaracoes_gerais_socio = $_FILES["declaracoes-gerais-socio"]["name"] ?? "";

// Verificando se a data está vazia e definindo um valor padrão se necessário
$data_inicio = !empty($_POST["data-inicio"]) ? $_POST["data-inicio"] : '1970-01-01';
$data_final = !empty($_POST["data-final"]) ? $_POST["data-final"] : '1970-12-31';

$sql = "INSERT INTO projetos (
  identificacao,
  representante_social,
  nome_fantasia,
  cnpj,
  endereco,
  rua,
  numero,
  cidade,
  estado,
  cep,
  representante_legal,
  cargo,
  cpf,
  rg,
  endereco_representante,
  rua_representante,
  numero_representante,
  cidade_representante,
  estado_representante,
  cep_representante,
  telefone,
  genero,
  raca,
  deficiencia,
  tipo_deficiencia,
  escolaridade,
  curriculo,
  nome_projeto,
  categoria,
  descricao_projeto,
  objetivo,
  meta,
  publico,
  acao_cultural,
  medidas_acessibilidade,
  implementacao_acessibilidade,
  local_execucao,
  data_inicio,  -- A data será passada corretamente aqui
  data_final,   -- Também para a data final
  estrategia_divulgacao,
  contrapartida,
  recursos_financeiros,
  detalhe_recursos,
  venda_produtos_ingressos,
  parametros_orcamentarios,
  anexos,
  estatuto_social,
  ata_eleicao_pose,
  documento_pessoal_dirigente,
  comprovante_residencia_dirigente,
  declaracoes_gerais,
  certificado_condicao_microempreendedor,
  cnpj_ativo,
  documento_pessoal_socio,
  comprovante_residencia_socio,
  declaracoes_gerais_socio
) VALUES (
  '$identificacao',
  '$representante_social',
  '$nome_fantasia',
  '$cnpj',
  '$endereco',
  '$rua',
  '$numero',
  '$cidade',
  '$estado',
  '$cep',
  '$representante_legal',
  '$cargo',
  '$cpf',
  '$rg',
  '$endereco_representante',
  '$rua_representante',
  '$numero_representante',
  '$cidade_representante',
  '$estado_representante',
  '$cep_representante',
  '$telefone',
  '$genero',
  '$raca',
  '$deficiencia',
  '$tipo_deficiencia',
  '$escolaridade',
  '$curriculo',
  '$nome_projeto',
  '$categoria',
  '$descricao_projeto',
  '$objetivo',
  '$meta',
  '$publico',
  '$acao_cultural',
  '$medidas_acessibilidade',
  '$implementacao_acessibilidade',
  '$local_execucao',
  '$data_inicio',  -- O valor da variável será tratado corretamente aqui
  '$data_final',
  '$estrategia_divulgacao',
  '$contrapartida',
  '$recursos_financeiros',
  '$detalhe_recursos',
  '$venda_produtos_ingressos',
  '$parametros_orcamentarios',
  '$anexos',
  '$estatuto_social',
  '$ata_eleicao_pose',
  '$documento_pessoal_dirigente',
  '$comprovante_residencia_dirigente',
  '$declaracoes_gerais',
  '$certificado_condicao_microempreendedor',
  '$cnpj_ativo',
  '$documento_pessoal_socio',
  '$comprovante_residencia_socio',
  '$declaracoes_gerais_socio'
)";

// Executa a query SQL
if ($conn->query($sql) === TRUE) {
  echo "Dados salvos com sucesso!";
} else {
  echo "Erro ao salvar dados: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
