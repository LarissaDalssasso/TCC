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
