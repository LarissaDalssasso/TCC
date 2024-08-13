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


-- // Exemplo de como armazenar uma nova senha ao registrar um novo usuário
-- $senha = "sua_senha";
-- $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

-- // Agora, insira $hashed_password no banco de dados
-- $stmt = $conn->prepare("INSERT INTO funcionario (nome, email, area, senha, genero) VALUES (?, ?, ?, ?, ?)");
-- $stmt->bind_param("sssss", $nome, $email, $area, $hashed_password, $genero);
-- $stmt->execute();
