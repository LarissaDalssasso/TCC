CREATE DATABASE site;

USE site;

CREATE TABLE funcionario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    area  ENUM('Esportes', 'Cultura', 'Turismo', 'Educação') NOT NULL,
    senha VARCHAR(255) NOT NULL,
    genero  ENUM('Masculino', 'Feminino', 'Outro') NOT NULL

);


USE site;

CREATE TABLE editalParte1 (
  id INT PRIMARY KEY,
  identificacao VARCHAR(255),
  representante_social VARCHAR(255),
  nome_fantasia VARCHAR(255),
  cnpj VARCHAR(255),
  endereco TEXT,
  rua VARCHAR(255),
  numero VARCHAR(255),
  cidade VARCHAR(255),
  estado VARCHAR(255),
  cep VARCHAR(255),
  representante_legal VARCHAR(255),
  cargo VARCHAR(255),
  cpf VARCHAR(255),
  rg VARCHAR(255),
  endereco_representante TEXT,
  rua_representante VARCHAR(255),
  numero_representante VARCHAR(255),
  cidade_representante VARCHAR(255),
  estado_representante VARCHAR(255),
  cep_representante VARCHAR(255),
  telefone VARCHAR(255),
  genero VARCHAR(255),
  raca VARCHAR(255),
  deficiencia VARCHAR(255),
  tipo_deficiencia VARCHAR(255),
  escolaridade VARCHAR(255),
  curriculo TEXT
);

CREATE TABLE editalParte2 (
  id INT PRIMARY KEY,
  nome_projeto VARCHAR(255),
  categoria VARCHAR(255),
  descricao_projeto TEXT,
  objetivo TEXT,
  meta TEXT,
  publico TEXT,
  acao_cultural TEXT,
  medidas_acessibilidade TEXT,
  implementacao_acessibilidade TEXT,
  local_execucao TEXT,
  data_inicio DATE,
  data_final DATE,
  estrategia_divulgacao TEXT,
  contrapartida TEXT,
  recursos_financeiros TEXT,
  detalhe_recursos TEXT,
  venda_produtos_ingressos TEXT,
  parametros_orcamentarios TEXT
);

CREATE TABLE editalParte3 (
  id INT PRIMARY KEY,
  anexos TEXT,
  estatuto_social TEXT,
  ata_eleicao_pose TEXT,
  documento_pessoal_dirigente TEXT,
  comprovante_residencia_dirigente TEXT,
  declaracoes_gerais TEXT,
  certificado_condicao_microempreendedor TEXT,
  cnpj_ativo TEXT,
  documento_pessoal_socio TEXT,
  comprovante_residencia_socio TEXT,
  declaracoes_gerais_socio TEXT
);
