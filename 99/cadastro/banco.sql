CREATE DATABASE site;

USE site;

CREATE TABLE funcionario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        area ENUM ('Esportes', 'Cultura', 'Turismo', 'Educação') NOT NULL,
        senha VARCHAR(255) NOT NULL,
        genero ENUM ('Masculino', 'Feminino', 'Outro') NOT NULL
    );

CREATE TABLE pt1Edital (
        id_pt1Edital INT AUTO_INCREMENT PRIMARY KEY,
        identificacao ENUM ('Pessoa Jurídica sem finalidade lucrativa','Pessoa Jurídica com finalidade lucrativa'),
        representanteSocial VARCHAR(200),
        nomeFantasia VARCHAR(200),
        cnpj VARCHAR(11),
        representantel VARCHAR(200),
        cargo VARCHAR(45),
        cpf VARCHAR(11),
        rg VARCHAR(9),
        telefone VARCHAR(14),
        genero ENUM ('Mulher cisgênero','Homem cisgênero','Mulher Transgênero','Homem Transgênero','Não Binárie','Não informar'),
        etnia ENUM ('Branca','Preta','Parda','Amarela','Indígena'),
        pcd BOOLEAN,
        simPcd ENUM ('Auditiva','Física','Intelectual','Múltipla','Visual'),
        escolaridade ENUM ('Não tenho Educação Formal','Ensino Médio Incompleto','Ensino Fundamental Incompleto','Ensino Médio Completo','Ensino Fundamental Completo','Curso Técnico Incompleto','Ensino Superior Incompleto','Ensino Superior Completo','Pós Graduação Completo'),
        currículoPJ VARCHAR(255),
    );

    CREATE TABLE pt2Edital(

    );

-- // Exemplo de como armazenar uma nova senha ao registrar um novo usuário
-- $senha = "sua_senha";
-- $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
-- // Agora, insira $hashed_password no banco de dados
-- $stmt = $conn->prepare("INSERT INTO funcionario (nome, email, area, senha, genero) VALUES (?, ?, ?, ?, ?)");
-- $stmt->bind_param("sssss", $nome, $email, $area, $hashed_password, $genero);
-- $stmt->execute();